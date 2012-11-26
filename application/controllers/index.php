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

        $posts = $this->model->post->load_post();

        $data = array(
        	'html' => $this->helper->html,
        	'posts' => $posts
        );
        $this->view('index', $data);
    }

    public function article($getVars)
    {
    	if (!empty($getVars['id'])) {
	    	$post = $this->model->post->load_post($getVars['id']);
    	}
    	else {
    		$post = null;
    	}

		$data = array(
    		'html' => $this->helper->html,
    		'post' => $post
    	);
		
		$this->view('article', $data);
    }

    public function create($getVars, $postVars)
    {
        $data = array(
            'html' => $this->helper->html,
            'show_form' => true,
            'errors' => ''
        );

        if (!empty($postVars)) {
            if ($this->model->post->add_post($postVars)) {
                $data['show_form'] = false;
            }
        }

        $this->view('create', $data);
    }

    public function remove($getVars, $postVars)
    {
        if (isset($postVars['id'])) {
            if ($this->model->post->remove_post($postVars['id'])) {
                
            }
        }
    }
}
