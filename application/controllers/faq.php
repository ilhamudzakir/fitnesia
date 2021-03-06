<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Faq extends PX_Controller {

	public function __construct() {
		parent::__construct();
		$this->controller_attr = array('controller' => 'faq','controller_name' => 'FAQ');
                $this->do_underconstruct();
                $this->check_visitor();
	}

	public function index() {
		$data = $this->get_app_settings_frontend();
                $data += $this->controller_attr;
                $data['faq_banner'] = $this->model_basic->select_where($this->tbl_banner, 'id', 5)->row();
                
                $data['faq'] = $this->model_basic->select_all_order($this->tbl_faq, 'id', 'ASC');
                
                $data['meta_data'] = $this->model_basic->select_where($this->tbl_meta_data, 'id', 9)->row();
		$data['page'] = $this->load->view('frontend/faq/index',$data,true);
		$this->load->view('frontend/layout',$data);
	}

}
