<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Partners extends PX_Controller {

	public function __construct() {
		parent::__construct();
		$this->controller_attr = array('controller' => 'partners','controller_name' => 'Partners');
                $this->do_underconstruct();
                $this->check_visitor();
	}

	public function index() {
		$data = $this->get_app_settings_frontend();
                $data += $this->controller_attr;
                $data['partners_banner'] = $this->model_basic->select_where($this->tbl_banner, 'id', 3)->row();
		$data['partners_content_1'] = $this->model_basic->select_where($this->tbl_static_content, 'id', 6)->row();
                $data['partners_icon_1'] = $this->model_basic->select_where($this->tbl_static_content, 'id', 7)->row();
                $data['partners_icon_2'] = $this->model_basic->select_where($this->tbl_static_content, 'id', 8)->row();
                $data['partners_icon_3'] = $this->model_basic->select_where($this->tbl_static_content, 'id', 9)->row();
                
                $data['meta_data'] = $this->model_basic->select_where($this->tbl_meta_data, 'id', 6)->row();
		$data['page'] = $this->load->view('frontend/partners/index',$data,true);
		$this->load->view('frontend/layout',$data);
	}
        
        function submit_form()
        {
            $table_field = $this->db->list_fields($this->tbl_become_partners);
            $insert = array();
            foreach ($table_field as $field) {
                $insert[$field] = $this->input->post($field);
            }
            if($this->input->post('other_saas'))
            {
                $insert['saas_type'] = $this->input->post('other_saas');
            }
            $insert['date_created'] = date('Y-m-d H:i:s', now());
            if($this->input->post('company') && $this->input->post('fullname') && $this->input->post('email'))
            {
                if(!$this->model_basic->insert_all($this->tbl_become_partners, $insert))
                        redirect('partners?goto=form&submit=error');
                redirect('partners?goto=form&submit=success');
            }
        }

}
