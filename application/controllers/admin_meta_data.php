<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Admin_meta_data extends PX_Controller {

    public function __construct() {
        parent::__construct();
        $this->check_login();
        $this->controller_attr = array('controller' => 'admin_meta_data', 'controller_name' => 'Admin Meta Data', 'controller_id' => 0);
    }

    public function index() {
        $data = $this->get_app_settings();
        $data += $this->controller_attr;
        $data += $this->get_function('Meta Data', 'admin_meta_data');
        $data += $this->get_menu();
        $this->check_userakses($data['function_id'], ACT_READ);
        $data['data'] = $this->model_basic->select_all($this->tbl_meta_data);
        $data['content'] = $this->load->view('backend/admin_meta_data/index', $data, true);
        $this->load->view('backend/index', $data);
    }

    function meta_data_form() {
        $data = $this->get_app_settings();
        $data += $this->controller_attr;
        $data += $this->get_function('Meta Data', 'admin_meta_data');
        $data += $this->get_menu();
        $this->check_userakses($data['function_id'], ACT_CREATE);
        $id = $this->input->post('id');
        if ($id) {
            $data['data'] = $this->model_basic->select_where($this->tbl_meta_data, 'id', $id)->row();
        }
        else
            $data['data'] = null;
        $data['content'] = $this->load->view('backend/admin_meta_data/meta_data_form', $data, true);
        $this->load->view('backend/index', $data);
    }

    function meta_data_add() {
        $data = $this->get_app_settings();
        $data += $this->controller_attr;
        $data += $this->get_function('News', 'admin_meta_data');
        $data += $this->get_menu();
        $this->check_userakses($data['function_id'], ACT_CREATE);
        
        $table_field = $this->db->list_fields($this->tbl_meta_data);
        $insert = array();
        foreach ($table_field as $field) {
            $insert[$field] = $this->input->post($field);
        }
        $insert['date_modified'] = date('Y-m-d H:i:s', now());
        if ($insert['page'] && $insert['description'] && $insert['meta_key']) {
            $do_insert = $this->model_basic->insert_all($this->tbl_meta_data, $insert);
            if ($do_insert)
                $this->returnJson(array('status' => 'ok', 'msg' => 'Input data success', 'redirect' => $data['controller']));
            else
                $this->returnJson(array('status' => 'error', 'msg' => 'Failed when saving data'));
        }
        else
            $this->returnJson(array('status' => 'error', 'msg' => 'Please check the form'));
    }

    function meta_data_edit() {
        $data = $this->get_app_settings();
        $data += $this->controller_attr;
        $data += $this->get_function('Meta Data', 'admin_meta_data');
        $data += $this->get_menu();
        $this->check_userakses($data['function_id'], ACT_UPDATE);
        
        $table_field = $this->db->list_fields($this->tbl_meta_data);
        $update = array();
        foreach ($table_field as $field) {
            $update[$field] = $this->input->post($field);
        }
        $update['date_modified'] = date('Y-m-d H:i:s', now());

        if ($update['id'] && $update['page'] && $update['description'] && $update['meta_key']) {
            $do_update = $this->model_basic->update($this->tbl_meta_data, $update, 'id', $update['id']);
            if ($do_update) {
                $this->returnJson(array('status' => 'ok', 'msg' => 'Update success', 'redirect' => $data['controller']));
            }
            else
                $this->returnJson(array('status' => 'error', 'msg' => 'Failed when updating data'));
        }
        else
            $this->returnJson(array('status' => 'error', 'msg' => 'Please complete the form'));
    }

    function meta_data_delete() {
        $data = $this->get_app_settings();
        $data += $this->controller_attr;
        $data += $this->get_function('Meta Data', 'admin_meta_data');
        $data += $this->get_menu();
        $this->check_userakses($data['function_id'], ACT_DELETE);
        $id = $this->input->post('id');
        $do_delete = $this->model_basic->delete($this->tbl_meta_data, 'id', $id);
        if ($do_delete) {
            $this->returnJson(array('status' => 'ok', 'msg' => 'Delete Success', 'redirect' => $data['controller']));
        }
        else
            $this->returnJson(array('status' => 'error', 'msg' => 'Delete Failed'));
    }
}