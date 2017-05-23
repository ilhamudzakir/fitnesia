<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends PX_Controller {

    public function __construct() {
        parent::__construct();
        // $data_row_ctr = $this->model_basic->select_where($this->table_menu,'target','admin')->row();
        $this->controller_attr = array('controller' => 'admin', 'controller_name' => 'Admin', 'controller_id' => 0);
    }

    public function index() {
        $data = $this->controller_attr;
        if ($this->session->userdata('admin') != FALSE) {
            redirect('admin/dashboard');
        } else
            redirect('admin/login');
    }

    function dashboard() {
        $data = $this->get_app_settings();
        $data += $this->controller_attr;
        $data += $this->get_function('Admin', 'admin');
        $data += $this->get_menu();
        if ($this->session->userdata('admin') != FALSE) {
            $data['total_access'] = $this->model_basic->select_sum($this->tbl_visitor, 'counter', 'total')->total;
            $data['total_visitor'] = $this->model_basic->get_count($this->tbl_visitor);
            $data['total_contact_us'] = $this->model_basic->select_where($this->tbl_contact_us, 'read_flag', 0)->num_rows();
            $data['total_become_partners'] = $this->model_basic->select_where($this->tbl_become_partners, 'read_flag', 0)->num_rows();
            $data['content'] = $this->load->view('backend/admin/dashboard', $data, true);
            $this->load->view('backend/index', $data);
        } else
            redirect('admin');
    }

    function login() {
        $data = $this->get_app_settings();
        $data += $this->controller_attr;
        $data += $this->get_function('Admin Login', 'admin_login');
        $data += $this->get_menu();
        $this->load->view('backend/admin/login', $data);
    }

    function do_login() {
        $username = $this->input->post('username');
        $password = $this->input->post('password');
        $user_data = $this->model_basic->select_where($this->tbl_user, 'username', $username)->row();
        if ($user_data) {
            if ($this->encrypt->decode($user_data->password) == $password) {
                $user_group = $this->model_basic->select_where($this->tbl_usergroup, 'id', $user_data->id_usergroup)->row()->usergroup_name;
                $data_user = array(
                    'admin_id' => $user_data->id,
                    'username' => $user_data->username,
                    'password' => $password,
                    'realname' => $user_data->realname,
                    'email' => $user_data->email,
                    'id_usergroup' => $user_data->id_usergroup,
                    'name_usergroup' => $user_group,
                    'photo' => $user_data->photo
                );
                $this->session->set_userdata('admin', $data_user);
                $this->returnJson(array('status' => 'ok', 'msg' => 'Login Success, you\'ll be redirect soon.', 'redirect' => 'admin/dashboard'));
            } else
                $this->returnJson(array('status' => 'error', 'msg' => 'Login failed, Wrong password.'));
        } else
            $this->returnJson(array('status' => 'error', 'msg' => 'Login failed, Username not registered.'));
    }

    function do_logout() {
        $data = $this->get_app_settings();
        $data += $this->controller_attr;
        $data += $this->get_function('Admin Logout', 'admin_logout');
        $data += $this->get_menu();
        if ($this->session->userdata('admin') != FALSE) {
            $this->session->unset_userdata('admin');
            redirect('admin');
        } else
            redirect('admin');
    }
    
    function get_data_access()
    {
        $flag = $this->input->post('status');
        if($flag == 2)
        {
            $day_now = date('d', now());
            $month_now = date('Y-m', now());
            $result = array();
            for($i=1; $i<=$day_now; $i++)
            {
                $day = str_pad($i, 2, '0', STR_PAD_LEFT);
                $date_start = $month_now.'-'.$day;
                $date_end = $month_now.'-'.$day;
                $result[$i] = new stdClass();
                $result[$i]->date = $month_now.'-'.$day;
                $counter = $this->model_visitor->get_sum_counter_by_date($date_start, $date_end)->counter;
                if($counter)
                    $result[$i]->counter = $counter;
                else
                    $result[$i]->counter = 0;
            }
        }
        else if($flag == 0)
        {
            $month_now = date('m', now());
            $year_now = date('Y', now());
            $last_day_month_now = date('t', now());
            $result = array();
            for($i=1; $i<=$month_now; $i++)
            {
                $month = str_pad($i, 2, '0', STR_PAD_LEFT);
                $date_start = $year_now.'-'.$month.'-01';
                $date_end = $year_now.'-'.$month.'-'.$last_day_month_now;
                $result[$i] = new stdClass();
                $result[$i]->date = $year_now.'-'.$month;
                $counter = $this->model_visitor->get_sum_counter_by_date($date_start, $date_end)->counter;
                if($counter)
                    $result[$i]->counter = $counter;
                else
                    $result[$i]->counter = 0;
            }
        }
        else if($flag == 1)
        {
            $year_start = 2016;
            $year_now = date('Y', now());
            $result = array();
            for($i=$year_start; $i<=$year_now; $i++)
            {
                $date_start = $i.'-01-01';
                $date_end = $i.'-12-31';
                $result[$i] = new stdClass();
                $result[$i]->date = date('Y', strtotime($date_start));
                $counter = $this->model_visitor->get_sum_counter_by_date($date_start, $date_end)->counter;
                if($counter)
                    $result[$i]->counter = $counter;
                else
                    $result[$i]->counter = 0;
            }
        }
        $this->returnJson(array('status' => 'ok', 'data' => $result));
    }
    
    function get_data_visitor()
    {
        $flag = $this->input->post('status');
        if($flag == 2)
        {
            $day_now = date('d', now());
            $month_now = date('Y-m', now());
            $result = array();
            for($i=1; $i<=$day_now; $i++)
            {
                $day = str_pad($i, 2, '0', STR_PAD_LEFT);
                $date_start = $month_now.'-'.$day;
                $date_end = $month_now.'-'.$day;
                $result[$i] = new stdClass();
                $result[$i]->date = $month_now.'-'.$day;
                $result[$i]->counter = $this->model_visitor->get_count_by_date($date_start, $date_end);
            }
        }
        else if($flag == 0)
        {
            $month_now = date('m', now());
            $year_now = date('Y', now());
            $last_day_month_now = date('t', now());
            $result = array();
            for($i=1; $i<=$month_now; $i++)
            {
                $month = str_pad($i, 2, '0', STR_PAD_LEFT);
                $date_start = $year_now.'-'.$month.'-01';
                $date_end = $year_now.'-'.$month.'-'.$last_day_month_now;
                $result[$i] = new stdClass();
                $result[$i]->date = $year_now.'-'.$month;
                $result[$i]->counter = $this->model_visitor->get_count_by_date($date_start, $date_end);
            }
        }
        else if($flag == 1)
        {
            $year_start = 2016;
            $year_now = date('Y', now());
            $result = array();
            for($i=$year_start; $i<=$year_now; $i++)
            {
                $date_start = $i.'-01-01';
                $date_end = $i.'-12-31';
                $result[$i] = new stdClass();
                $result[$i]->date = date('Y', strtotime($date_start));
                $result[$i]->counter = $this->model_visitor->get_count_by_date($date_start, $date_end);
            }
        }
        $this->returnJson(array('status' => 'ok', 'data' => $result));
    }

    function php_info() {
        echo phpinfo();
    }

}
