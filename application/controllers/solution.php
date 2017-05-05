<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Solution extends PX_Controller {

	public function __construct() {
		parent::__construct();
		$this->controller_attr = array('controller' => 'solution','controller_name' => 'Solution');
	}

	public function index() {
		$data = $this->controller_attr;
		

		$data['page'] = $this->load->view('frontend/solution/index',$data,true);
		$this->load->view('frontend/layout',$data);
	}

	public function detail() {
		$data = $this->controller_attr;
		

		$data['page'] = $this->load->view('frontend/solution/detail',$data,true);
		$this->load->view('frontend/layout',$data);
	}

}
