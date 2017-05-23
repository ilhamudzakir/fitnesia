<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Career extends PX_Controller {

	public function __construct() {
		parent::__construct();
		$this->controller_attr = array('controller' => 'career','controller_name' => 'Career');
                $this->do_underconstruct();
                $this->check_visitor();
	}

	public function index() {
		$data = $this->get_app_settings_frontend();
                $data += $this->controller_attr;
		$data['careers_banner'] = $this->model_basic->select_where($this->tbl_banner, 'id', 4)->row();
		$data['page'] = $this->load->view('frontend/career/index',$data,true);
		$this->load->view('frontend/layout',$data);
	}

}
