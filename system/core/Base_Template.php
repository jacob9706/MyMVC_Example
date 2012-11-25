<?php
/**
 * User: Jacob Ebey
 * Date: 11/21/12
 * URL: Base_Template.php
 */

class Base_Template
{
    /*********************************************
     * The load method is used to load a utility
     * into the class. helpers and models are the
     * only onces currently supported at this time
     *********************************************/
    public function load($what, $name)
    {
        $class = ucfirst($name) . '_' . ucfirst($what);

    	if ($what == 'helper')
    	{
	        require_once 'system/' . $what . '/' . $class . '.php';
        } 
        
        elseif ($what == 'model')
        {
        	require_once 'application/models/' . $name . '.php';
        }

        $this->$what->$name = new $class;
    }

    /*********************************************
     * The load method is used to load a utility
     * into the class as a specified name. helpers
     * and models are the only onces currently 
     * supported
     *********************************************/
    public function load_as($what, $name, $as)
    {
        $class = ucfirst($name) . '_' . ucfirst($what);

        if ($what == 'helper')
        {
            require_once 'system/' . $what . '/' . $class . '.php';
        } 
        
        elseif ($what == 'model')
        {
            require_once 'application/models/' . $name . '.php';
        }

        $this->$what->$as = new $class;
    }
}