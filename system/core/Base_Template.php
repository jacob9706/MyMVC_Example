<?php
/**
 * User: Jacob Ebey
 * Date: 11/21/12
 * URL: Base_Template.php
 */

class Base_Template
{
    public function load($what, $name)
    {
        $class = ucfirst($name) . '_' . ucfirst($what);

    	if ($what == 'helper')
    	{
	        require_once 'system/' . $what . '/' . $class . '.php';
        } elseif ($what == 'model') {
        	require_once 'application/models/' . $name . '.php';
        }

        $this->$what->$name = new $class;
    }

    public function load_as($what, $name, $as)
    {
        $class = ucfirst($name) . '_' . ucfirst($what);
        require_once 'system/' . $what . '/' . $class . '.php';
        $this->$what->$as = new $class;
    }

    public function view($templates, array $variables)
    {
    	new View_Template($templates, $variables);
    }
}
