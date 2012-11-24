<?php
/**
 * User: Jacob Ebey
 * Date: 11/21/12
 * URL: index.php
 */

class Index_Controller extends Controller_Template
{
	public function __construct()
	{
		$this->load('helper', 'form');
        $this->load('helper', 'sanitize');
        $this->load('helper', 'html');
	}

    public function index($getVars)
    {
    	$this->helper->form->open("", "post", "form");
		$this->helper->form->input("Test", "test", "", "");
		$this->helper->form->submit("Submit", "submit");

        $this->helper->sanitize->sanitize($getVars, array('name' => 'string', 'age' => 'double', 'test' => 'boolean'));

    	$vars = array(
    		'title' => 'test',
    		'gets' => $getVars,
    		'form' => $this->helper->form,
            'html' => $this->helper->html
    	);

        $this->view(array('test', 'test2'), $vars);
    }
}
