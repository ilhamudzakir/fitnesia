<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Partners extends PX_Controller {

	public function __construct() {
		parent::__construct();
		$this->controller_attr = array('controller' => 'partners','controller_name' => 'Partners');
	}

	public function index() {
		$data = $this->controller_attr;
		

		$data['page'] = $this->load->view('frontend/partners/index',$data,true);
		$this->load->view('frontend/layout',$data);
	}

	public function help() {
		$data = $this->controller_attr;
		

		$data['page'] = $this->load->view('frontend/partners/help',$data,true);
		$this->load->view('frontend/layout',$data);
	}

}
