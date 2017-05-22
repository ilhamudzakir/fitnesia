<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Contact extends PX_Controller {

	public function __construct() {
		parent::__construct();
		$this->controller_attr = array('controller' => 'contact','controller_name' => 'Contact');
                $this->do_underconstruct();
	}

	public function index() {
		$data = $this->get_app_settings_frontend();
                $data += $this->controller_attr;
		
		$data['page'] = $this->load->view('frontend/contact/index',$data,true);
		$this->load->view('frontend/layout',$data);
	}

}
