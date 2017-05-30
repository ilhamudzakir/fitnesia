<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends PX_Controller {

	public function __construct() {
		parent::__construct();
		$this->controller_attr = array('controller' => 'home','controller_name' => 'Home');
                $this->do_underconstruct();
                $this->check_visitor();
	}

	public function index() {
		$data = $this->get_app_settings_frontend();
                $data += $this->controller_attr;
                
                $data['home_banner'] = $this->model_basic->select_where($this->tbl_banner, 'id', 1)->row();
                
                $data['home_icon_1'] = $this->model_basic->select_where($this->tbl_static_content, 'id', 1)->row();
                $data['home_icon_2'] = $this->model_basic->select_where($this->tbl_static_content, 'id', 2)->row();
                $data['home_icon_3'] = $this->model_basic->select_where($this->tbl_static_content, 'id', 3)->row();
                $data['home_content_1'] = $this->model_basic->select_where($this->tbl_static_content, 'id', 4)->row();
		
		$data['page'] = $this->load->view('frontend/home/index',$data,true);
		$this->load->view('frontend/layout',$data);
	}

	public function learn() {
		$data = $this->get_app_settings_frontend();
                $data += $this->controller_attr;
		$data['home_banner_2'] = $this->model_basic->select_where($this->tbl_banner, 'id', 6)->row();
                $data['home_learn_1'] = $this->model_basic->select_where($this->tbl_static_content, 'id', 15)->row();
                $data['home_learn_2'] = $this->model_basic->select_where($this->tbl_static_content, 'id', 16)->row();
                $data['home_learn_3'] = $this->model_basic->select_where($this->tbl_static_content, 'id', 17)->row();
                $data['home_learn_4'] = $this->model_basic->select_where($this->tbl_static_content, 'id', 18)->row();
		$data['page'] = $this->load->view('frontend/home/learn',$data,true);
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
