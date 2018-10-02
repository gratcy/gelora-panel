<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends MX_Controller {
	function __construct() {
		parent::__construct();
		$this -> load -> model('Home_model');
	}

	public function index()
	{
		$data['total_pages'] = $this -> Home_model -> __get_stats(1);
		$data['total_posts'] = $this -> Home_model -> __get_stats(2);
		$data['total_categories'] = $this -> Home_model -> __get_stats(3);
		$data['total_users'] = $this -> Home_model -> __get_stats(4);
		$this->load->view('index', $data);
	}
}
