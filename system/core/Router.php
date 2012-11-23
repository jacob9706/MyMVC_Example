<?php
/**
 * User: Jacob Ebey
 * Date: 11/21/12PM
 * URL: Router.php
 */

class Router
{
    /*********************************************
     * Private Variables
     *********************************************/
    private
        $getVars = array(),
        $class,
        $method;

    /**
     * This is used to route the application to the correct controller
     * @param $pathInfo
     *     This is the $_SERVER['PATH_INFO'] variable
     */
    public function route()
    {
        /*********************************************
         * Retrieve info from the url to parse for
         * controller, method and variables
         *********************************************/
        $pathInfo = isset($_SERVER['PATH_INFO']) ? $_SERVER['PATH_INFO'] : '';

        /*********************************************
         * Check if pathInfo is set and has
         * information relevant to me
         *********************************************/
        if (isset($pathInfo) && !empty($pathInfo) && $pathInfo != '/') {
            /*********************************************
             * Trim off last '/' to avoid an empty var
             * in the emulated get var array
             *********************************************/
            $request = rtrim($pathInfo, '/');

            /*********************************************
             * Explode the request into array and remove
             * empty slot in array caused by te leading
             * '/'
             *********************************************/
            $parsed = explode('/', $request);
            array_shift($parsed);
        } else {
            $parsed = array();
        }

        /*********************************************
         * Get the class to load from the $parsed var
         * and if it was empty we assign it to index
         *********************************************/
        $this->class = array_shift($parsed);
        $this->class = empty($this->class) ? 'index' : $this->class;

        /*********************************************
         * Get the method to load from the $parsed var
         * amd if it was empty we assign it to index
         *********************************************/
        $this->method = array_shift($parsed);
        $this->method = empty($this->method) ? 'index' : $this->method;

        /*********************************************
         * Separate all variables passed through the
         * url and store them in the class getVars
         *********************************************/
        if (!empty($parsed)) {
            foreach ($parsed as &$arg) {
                if (strpos($arg, '=')) {
                    list($var, $val) = explode('=', $arg);
                    $this->getVars[urldecode($var)] = urldecode($val);
                } else {
                    $this->getVars[] = urldecode($arg);
                }
            }
        }

        /*********************************************
         * Build the path to the file to load the
         * class and methods from
         *********************************************/
        $target = 'application' . DS . 'controllers' . DS . $this->class . '.php';

        /*********************************************
         * Check if the file exists and if it does
         * include it and check if the class and
         * method exists. If they do we create a new
         * instance of the class and invoke the
         * method
         *********************************************/
        if (file_exists($target)) {
            require_once $target;

            $class = ucfirst($this->class) . '_Controller';

            if (class_exists($class)) {
                $controller = new $class;
            } else {
                raise_error("Controller {$class} not fount");
            }

            if (method_exists($controller, $this->method)) {
                $controller->{$this->method}($this->getVars, $_POST);
            } else {
                raise_error("Method {$this->method} not fount");
            }
        } else {
            raise_error("File {$target} not found");
        }
    }
}