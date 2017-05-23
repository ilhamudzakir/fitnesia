<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Admin_become_partners extends PX_Controller {

    public function __construct() {
        parent::__construct();
        $this->check_login();
        $this->controller_attr = array('controller' => 'admin_become_partners', 'controller_name' => 'Become Partners', 'controller_id' => 0);
    }

    public function index() {
        $data = $this->get_app_settings();
        $data += $this->controller_attr;
        $data += $this->get_function('Become Partners', 'admin_become_partners');
        $data += $this->get_menu();
        $this->check_userakses($data['function_id'], ACT_READ);
        $data['data'] = $this->model_basic->select_all_order($this->tbl_become_partners, 'id', 'DESC');
        $data['content'] = $this->load->view('backend/admin_become_partners/index', $data, true);
        $this->load->view('backend/index', $data);
    }
    
    function detail($id)
    {
        $data = $this->get_app_settings();
        $data += $this->controller_attr;
        $data += $this->get_function('Become Partners', 'admin_become_partners');
        $data += $this->get_menu();
        $this->check_userakses($data['function_id'], ACT_READ);
        
        $detail = $this->model_basic->select_where($this->tbl_become_partners, 'id', $id);
        if($detail->num_rows() != 1)
        {
            redirect('admin_become_partners');
        }
        if($detail->row()->read_flag == 0)
        {
            $update = array('read_flag' => 1);
            $this->model_basic->update($this->tbl_become_partners, $update, 'id', $detail->row()->id);
        }
        $detail->row()->date_created = date('d M Y H:i:s', strtotime($detail->row()->date_created));
        $data['data'] = $detail->row();
        
        $data['content'] = $this->load->view('backend/admin_become_partners/detail', $data, true);
        $this->load->view('backend/index', $data);
    }
}