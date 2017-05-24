<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class About extends PX_Controller {

	public function __construct() {
		parent::__construct();
		$this->controller_attr = array('controller' => 'about','controller_name' => 'About');
                $this->do_underconstruct();
                $this->check_visitor();
	}

	public function index() {
		$data = $this->get_app_settings_frontend();
                $data += $this->controller_attr;
                $data['about_banner'] = $this->model_basic->select_where($this->tbl_banner, 'id', 2)->row();
                $data['about'] = $this->model_basic->select_where($this->tbl_static_content, 'id', 5)->row();
		$data['page'] = $this->load->view('frontend/about/index',$data,true);
		$this->load->view('frontend/layout',$data);
	}

}
