<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class About extends PX_Controller {

	public function __construct() {
		parent::__construct();
		$this->controller_attr = array('controller' => 'about','controller_name' => 'About');
                $this->do_underconstruct();
	}

	public function index() {
		$data = $this->get_app_settings();
                $data += $this->controller_attr;

		$data['page'] = $this->load->view('frontend/about/index',$data,true);
		$this->load->view('frontend/layout',$data);
	}

}
