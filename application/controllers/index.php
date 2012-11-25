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
        $this->load('model', 'test');
	}

    public function index($getVars)
    {
        $this->helper->sanitize->sanitize($getVars, array('name' => 'string', 'age' => 'double', 'test' => 'boolean'));

        $data = $this->model->test->test();
        
        $this->view('view',$data[0]);
    }
}
