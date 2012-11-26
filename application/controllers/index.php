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
		$this->load('model', 'post');
		$this->load('helper', 'html');
	}

    public function index($getVars)
    {
    	// $this->model->post->setup();

        $posts = $this->model->post->load();

        $data = array(
        	'html' => $this->helper->html,
        	'posts' => $posts
        );
        $this->view('index', $data);
    }

    public function article($getVars)
    {
    	
    }
}
