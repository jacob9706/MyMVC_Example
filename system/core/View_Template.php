<?php
/**
 * User: Jacob Ebey
 * Date: 11/21/12
 * URL: Controller_Template.php
 */

class View_Template
{
	/*********************************************
     * Private variables
     *********************************************/
	private
	$variables,
	$render = false;
	
	/*********************************************
     * The constructor takes ether a string for
     * a single template and an assosiative array
     * of key value pares that are parsed into 
     * variables to be used within the templates
     *********************************************/
	public function __construct($templates, array $variables)
	{
		$this->variables = $variables;
		if (is_array($templates)) {
			$this->render = array();
			foreach ($templates as &$tmp) {
				$file = 'application' . DS . 'views' . DS . $tmp . '.php';
				if (file_exists($file)) {
					$this->render[] = $file;
				} else {
					$this->render[] = false;
				}
			}
		} else {
			$file = 'application' . DS . 'views' . DS . $templates . '.php';
			if (file_exists($file)) {
				$this->render = $file;
			}
		}
	}

	/*********************************************
     * On destruction we parse each thing in the
     * $this->variables array into the variabels
     * for the templates and load the view files
     * if they exist
     *********************************************/
	public function __destruct()
	{
		foreach ($this->variables as $var => &$val) {
			$$var = $val;
		}

		if (is_array($this->render)) {
			foreach ($this->render as &$render) {
				if ($render) {
					include $render;
				}
			}
		} else {
			if ($this->render) {
				include $this->render;
			}
		}
	}
}