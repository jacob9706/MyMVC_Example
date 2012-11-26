<?php

class Post_Model extends Model_Template
{
	public function __construct()
	{
		$this->load_as('helper', 'database', 'db');
		$this->load('helper', 'sanitize');
	}

	public function add(array $data)
	{
		$allowed = array(
			'name' => 'plain',
			'post' => 'nohtml'
		);
		$this->helper->sanitize->sanitize($data);

		if (!empty($data) && sizeof($data) == 2) {
			return $this->helper->db->insert('post', $data);
		}
	}

	public function load($post = null)
	{
		if (!empty($post)) {
			$post = (int)$post;
			$results = $this->helper->db->run("SELECT * FROM post WHERE id='{$post}'");
			if (is_array($results) && !empty($results)) {
				return $results[0];
			}
		}
		else {
			$results = $this->helper->db->run("SELECT * FROM post");
			return $results;
		}
	}

	public function setup()
	{
		// $this->helper->db->run("CREATE TABLE post(id INTEGER PRIMARY KEY, name VARCHAR(40) NOT NULL, post TEXT NOT NULL);");
		// $this->helper->db->insert('post', array(
		// 	'name' => "Test Title",
		// 	'post' => "Test Post..."
		// ));
	}
}