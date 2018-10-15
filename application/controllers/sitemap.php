<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Sitemap extends PX_Controller {

	public function __construct() {
		parent::__construct();
		$this->controller_attr = array('controller' => 'sitemap','controller_name' => 'SITEMAP');
                $this->do_underconstruct();
                $this->check_visitor();
	}

	public function index() {
		$data = $this->get_app_settings_frontend();
                $data += $this->controller_attr;
                
                $data['meta_data'] = $this->model_basic->select_where($this->tbl_meta_data, 'id', 10)->row();
		$data['page'] = $this->load->view('frontend/sitemap/index',$data,true);
		$this->load->view('frontend/layout',$data);
	}

}
