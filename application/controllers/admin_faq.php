<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Admin_faq extends PX_Controller {

    public function __construct() {
        parent::__construct();
        $this->check_login();
        $this->controller_attr = array('controller' => 'admin_faq', 'controller_name' => 'Admin FAQ', 'controller_id' => 0);
    }

    public function index() {
        $data = $this->get_app_settings();
        $data += $this->controller_attr;
        $data += $this->get_function('FAQ', 'admin_faq');
        $data += $this->get_menu();
        $this->check_userakses($data['function_id'], ACT_READ);
        $data['data'] = $this->model_basic->select_all($this->tbl_faq);
        $data['content'] = $this->load->view('backend/admin_faq/index', $data, true);
        $this->load->view('backend/index', $data);
    }

    function faq_form() {
        $data = $this->get_app_settings();
        $data += $this->controller_attr;
        $data += $this->get_function('FAQ', 'admin_faq');
        $data += $this->get_menu();
        $this->check_userakses($data['function_id'], ACT_CREATE);
        $id = $this->input->post('id');
        if ($id) {
            $data['data'] = $this->model_basic->select_where($this->tbl_faq, 'id', $id)->row();
            $content = new domDocument;
            libxml_use_internal_errors(true);
            $content->loadHTML($data['data']->content);
            libxml_use_internal_errors(false);
            libxml_use_internal_errors(false);
            $content->preserveWhiteSpace = false;
            $images = $content->getElementsByTagName('img');
            if ($images) {
                foreach ($images as $image) {
                    $data['data']->image[] = $image->getAttribute('src');
                }
            }
        }
        else
            $data['data'] = null;
        $data['content'] = $this->load->view('backend/admin_faq/faq_form', $data, true);
        $this->load->view('backend/index', $data);
    }

    function faq_add() {
        $data = $this->get_app_settings();
        $data += $this->controller_attr;
        $data += $this->get_function('News', 'admin_faq');
        $data += $this->get_menu();
        $this->check_userakses($data['function_id'], ACT_CREATE);
        
        $table_field = $this->db->list_fields($this->tbl_faq);
        $insert = array();
        foreach ($table_field as $field) {
            $insert[$field] = $this->input->post($field);
        }
        $insert['date_modified'] = date('Y-m-d H:i:s', now());
        if ($insert['title'] && $insert['subtitle'] && $insert['content']) {
            $do_insert = $this->model_basic->insert_all($this->tbl_faq, $insert);
            if ($do_insert)
                $this->returnJson(array('status' => 'ok', 'msg' => 'Input data success', 'redirect' => $data['controller']));
            else
                $this->returnJson(array('status' => 'error', 'msg' => 'Failed when saving data'));
        }
        else
            $this->returnJson(array('status' => 'error', 'msg' => 'Please check the form'));
    }

    function faq_edit() {
        $data = $this->get_app_settings();
        $data += $this->controller_attr;
        $data += $this->get_function('FAQ', 'admin_faq');
        $data += $this->get_menu();
        $this->check_userakses($data['function_id'], ACT_UPDATE);
        
        $table_field = $this->db->list_fields($this->tbl_faq);
        $update = array();
        foreach ($table_field as $field) {
            $update[$field] = $this->input->post($field);
        }
        $update['date_modified'] = date('Y-m-d H:i:s', now());

        if ($update['id'] && $update['title'] && $update['subtitle'] && $update['content']) {
            $do_update = $this->model_basic->update($this->tbl_faq, $update, 'id', $update['id']);
            if ($do_update) {
                $this->returnJson(array('status' => 'ok', 'msg' => 'Update success', 'redirect' => $data['controller']));
            }
            else
                $this->returnJson(array('status' => 'error', 'msg' => 'Failed when updating data'));
        }
        else
            $this->returnJson(array('status' => 'error', 'msg' => 'Please complete the form'));
    }

    function faq_delete() {
        $data = $this->get_app_settings();
        $data += $this->controller_attr;
        $data += $this->get_function('FAQ', 'admin_faq');
        $data += $this->get_menu();
        $this->check_userakses($data['function_id'], ACT_DELETE);
        $id = $this->input->post('id');
        $do_delete = $this->model_basic->delete($this->tbl_faq, 'id', $id);
        if ($do_delete) {
            $this->returnJson(array('status' => 'ok', 'msg' => 'Delete Success', 'redirect' => $data['controller']));
        }
        else
            $this->returnJson(array('status' => 'error', 'msg' => 'Delete Failed'));
    }
}