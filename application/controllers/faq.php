<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Faq extends PX_Controller {

	public function __construct() {
		parent::__construct();
		$this->controller_attr = array('controller' => 'faq','controller_name' => 'FAQ');
                $this->do_underconstruct();
	}

	public function index() {
		$data = $this->get_app_settings();
                $data += $this->controller_attr;

		$data['page'] = $this->load->view('frontend/faq/index',$data,true);
		$this->load->view('frontend/layout',$data);
	}

}
