<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Privacy extends PX_Controller {

	public function __construct() {
		parent::__construct();
		$this->controller_attr = array('controller' => 'privacy','controller_name' => 'Privacy');
	}

	public function index() {
		$data = $this->controller_attr;
		

		$data['page'] = $this->load->view('frontend/privacy/index',$data,true);
		$this->load->view('frontend/layout',$data);
	}

}
