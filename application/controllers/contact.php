<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Contact extends PX_Controller {

	public function __construct() {
		parent::__construct();
		$this->controller_attr = array('controller' => 'contact','controller_name' => 'Contact');
                $this->do_underconstruct();
                $this->check_visitor();
	}

	public function index() {
		$data = $this->get_app_settings_frontend();
                $data += $this->controller_attr;
		
		$data['page'] = $this->load->view('frontend/contact/index',$data,true);
		$this->load->view('frontend/layout',$data);
	}
        
        function submit_form()
        {
            $table_field = $this->db->list_fields($this->tbl_contact_us);
            $insert = array();
            foreach ($table_field as $field) {
                $insert[$field] = $this->input->post($field);
            }
            $insert['date_created'] = date('Y-m-d H:i:s', now());
            if($this->input->post('company') && $this->input->post('fullname') && $this->input->post('email'))
            {
                if(!$this->model_basic->insert_all($this->tbl_contact_us, $insert))
                        redirect('contact?submit=error');
                redirect('contact?submit=success');
            }
        }

}
