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
	}

    public function index($getVars)
    {
    	$this->helper->form->open("", "post", "form");
		$this->helper->form->input("Test", "test", "", "");
		$this->helper->form->submit("Submit", "submit");

    	$vars = array(
    		'title' => 'test',
    		'gets' => $getVars,
    		'form' => $this->helper->form
    	);

        $this->view(array('test', 'test2'), $vars);
    }
}
