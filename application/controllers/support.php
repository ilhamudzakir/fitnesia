<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Support extends PX_Controller {

	public function __construct() {
		parent::__construct();
		$this->controller_attr = array('controller' => 'support','controller_name' => 'Support');
                $this->do_underconstruct();
                $this->check_visitor();
	}

	public function index() {
		$data = $this->get_app_settings_frontend();
                $data += $this->controller_attr;
		
                $data['meta_data'] = $this->model_basic->select_where($this->tbl_meta_data, 'id', 5)->row();
		$data['page'] = $this->load->view('frontend/support/index',$data,true);
		$this->load->view('frontend/layout',$data);
	}

	public function detail() {
		$data = $this->get_app_settings_frontend();
                $data += $this->controller_attr;
		
                $data['meta_data'] = $this->model_basic->select_where($this->tbl_meta_data, 'id', 5)->row();
		$data['page'] = $this->load->view('frontend/support/detail',$data,true);
		$this->load->view('frontend/layout',$data);
	}

}
