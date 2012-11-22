<?php
/**
 * User: Jacob Ebey
 * Date: 11/21/12
 * URL: index.php
 */
class Index_Controller extends Controller_Template
{
    public function index($getVars)
    {
        $this->view(array('test', 'test2'), array('title' => 'test', 'gets' => $getVars));
    }
}
