<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Partners extends PX_Controller {

	public function __construct() {
		parent::__construct();
		$this->controller_attr = array('controller' => 'partners','controller_name' => 'Partners');
                $this->do_underconstruct();
	}

	public function index() {
		$data = $this->get_app_settings_frontend();
                $data += $this->controller_attr;
                $data['partners_banner'] = $this->model_basic->select_where($this->tbl_banner, 'id', 3)->row();
		$data['partners_content_1'] = $this->model_basic->select_where($this->tbl_static_content, 'id', 6)->row();
                $data['partners_icon_1'] = $this->model_basic->select_where($this->tbl_static_content, 'id', 7)->row();
                $data['partners_icon_2'] = $this->model_basic->select_where($this->tbl_static_content, 'id', 8)->row();
                $data['partners_icon_3'] = $this->model_basic->select_where($this->tbl_static_content, 'id', 9)->row();
		$data['page'] = $this->load->view('frontend/partners/index',$data,true);
		$this->load->view('frontend/layout',$data);
	}

	public function help() {
		$data = $this->get_app_settings_frontend();
                $data += $this->controller_attr;
                $data['partners_banner_2'] = $this->model_basic->select_where($this->tbl_banner, 'id', 7)->row();
		$data['partners_help_1'] = $this->model_basic->select_where($this->tbl_static_content, 'id', 10)->row();
                $data['partners_help_2'] = $this->model_basic->select_where($this->tbl_static_content, 'id', 11)->row();
                $data['partners_help_3'] = $this->model_basic->select_where($this->tbl_static_content, 'id', 12)->row();
                $data['partners_help_4'] = $this->model_basic->select_where($this->tbl_static_content, 'id', 13)->row();
                $data['partners_help_5'] = $this->model_basic->select_where($this->tbl_static_content, 'id', 14)->row();
		$data['page'] = $this->load->view('frontend/partners/help',$data,true);
		$this->load->view('frontend/layout',$data);
	}

}
