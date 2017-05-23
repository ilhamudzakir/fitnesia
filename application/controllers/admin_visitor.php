<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Admin_visitor extends PX_Controller {

    public function __construct() {
        parent::__construct();
        $this->check_login();
        $this->controller_attr = array('controller' => 'admin_visitor', 'controller_name' => 'Visitors', 'controller_id' => 0);
    }

    public function index() {
        $data = $this->get_app_settings();
        $data += $this->controller_attr;
        $data += $this->get_function('Visitors', 'admin_visitor');
        $data += $this->get_menu();
        $this->check_userakses($data['function_id'], ACT_READ);
        $data['data'] = $this->model_basic->select_all_order($this->tbl_visitor, 'id', 'DESC');
        $data['content'] = $this->load->view('backend/admin_visitor/index', $data, true);
        $this->load->view('backend/index', $data);
    }
}