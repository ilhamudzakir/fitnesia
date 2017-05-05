<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends PX_Controller {

	public function __construct() {
		parent::__construct();
		$this->controller_attr = array('controller' => 'home','controller_name' => 'Home');
	}

	public function index() {
		$data = $this->controller_attr;
		

		$data['page'] = $this->load->view('frontend/home/index',$data,true);
		$this->load->view('frontend/layout',$data);
	}

	public function learn() {
		$data = $this->controller_attr;
		

		$data['page'] = $this->load->view('frontend/home/learn',$data,true);
		$this->load->view('frontend/layout',$data);
	}

}
