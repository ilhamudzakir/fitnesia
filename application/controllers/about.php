<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class About extends PX_Controller {

	public function __construct() {
		parent::__construct();
		$this->controller_attr = array('controller' => 'about','controller_name' => 'About');
	}

	public function index() {
		$data = $this->controller_attr;
		

		$data['page'] = $this->load->view('frontend/about/index',$data,true);
		$this->load->view('frontend/layout',$data);
	}

}
