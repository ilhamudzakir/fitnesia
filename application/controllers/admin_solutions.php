<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Admin_solutions extends PX_Controller {

    public function __construct() {
        parent::__construct();
        $this->check_login();
        $this->controller_attr = array('controller' => 'admin_solutions', 'controller_name' => 'Admin Solutions', 'controller_id' => 0);
    }

    public function index() {
        
    }

    function solution_list() {
        $data = $this->get_app_settings();
        $data += $this->controller_attr;
        $data += $this->get_function('Solution List', 'solution_list');
        $data += $this->get_menu();
        $this->check_userakses($data['function_id'], ACT_READ);
        $data['data'] = $this->model_basic->select_all_order($this->tbl_solutions, 'id', 'DESC');
        foreach($data['data'] as $data_row)
        {
            switch($data_row->category_id)
            {
                case 1:
                    $data_row->category = 'Technology';
                    break;
                case 2:
                    $data_row->category = 'Business';
                    break;
                case 3:
                    $data_row->category = 'Industry';
                    break;
                default:
                    $data_row->category = 'Unknown';
                    break;
            }
        }
        $data['content'] = $this->load->view('backend/admin_solutions/solution_list', $data, true);
        $this->load->view('backend/index', $data);
    }

    function solution_list_form() {
        $data = $this->get_app_settings();
        $data += $this->controller_attr;
        $data += $this->get_function('Solution List', 'solution_list');
        $data += $this->get_menu();
        $this->check_userakses($data['function_id'], ACT_CREATE);
        $id = $this->input->post('id');
        if ($id) {
            $data['data'] = $this->model_basic->select_where($this->tbl_solutions, 'id', $id)->row();
            $content = new domDocument;
            libxml_use_internal_errors(true);
            $content->loadHTML($data['data']->content);
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
        $data['content'] = $this->load->view('backend/admin_solutions/solution_list_form', $data, true);
        $this->load->view('backend/index', $data);
    }

    function solution_list_add() {
        $data = $this->get_app_settings();
        $data += $this->controller_attr;
        $data += $this->get_function('News', 'solution_list');
        $data += $this->get_menu();
        $img_name_crop = uniqid() . '-solutions.jpg';
        $this->check_userakses($data['function_id'], ACT_CREATE);
        
        $images = $this->input->post('images');
        $table_field = $this->db->list_fields($this->tbl_solutions);
        $insert = array();
        foreach ($table_field as $field) {
            $insert[$field] = $this->input->post($field);
        }
        $insert['photo'] = $img_name_crop;
        $insert['date_modified'] = date('Y-m-d H:i:s', now());
        if ($insert['title']) {
            $do_insert = $this->model_basic->insert_all($this->tbl_solutions, $insert);
            if ($do_insert) {
                if ($images) {
                    if (!is_dir(FCPATH . "assets/uploads/solution_list/" . $do_insert->id))
                        mkdir(FCPATH . "assets/uploads/solution_list/" . $do_insert->id);
                    $content = $insert['description'];
                    foreach ($images as $im) {
                        if (strpos($content, $im) !== false) {
                            $new_im = 'assets/uploads/solution_list/' . $do_insert->id . '/' . basename($im);
                            @copy($im, $new_im);
                            $content = str_replace($im, $new_im, $content);
                        }
                    }
                    $update['content'] = $content;
                    $do_update = $this->model_basic->update($this->tbl_solutions, $update, 'id', $do_insert->id);
                }
                $redirect = $data['controller'] . '/solution_list/' . $do_insert->id;
                if ($this->input->post('photo')) {
                    $origw = $this->input->post('origwidth');
                    $origh = $this->input->post('origheight');
                    $fakew = $this->input->post('fakewidth');
                    $fakeh = $this->input->post('fakeheight');
                    $x = $this->input->post('x') * $origw / $fakew;
                    $y = $this->input->post('y') * $origh / $fakeh;
                    # ambil width crop
                    $targ_w = $this->input->post('w') * $origw / $fakew;
                    # ambil heigth crop
                    $targ_h = $this->input->post('h') * $origh / $fakeh;
                    # rasio gambar crop
                    $jpeg_quality = 100;
                    if (!is_dir(FCPATH . 'assets/uploads/solution_list/' . $do_insert->id))
                        mkdir(FCPATH . 'assets/uploads/solution_list/' . $do_insert->id);
                    if (basename($this->input->post('photo')) && $this->input->post('photo') != null) {
                        $src = $this->input->post('photo');
                    }
                    # inisial handle copy gambar
                    $ext = pathinfo($src, PATHINFO_EXTENSION);

                    if ($ext == 'jpg' || $ext == 'jpeg' || $ext == 'JPG' || $ext == 'JPEG')
                        $img_r = imagecreatefromjpeg($src);
                    if ($ext == 'png' || $ext == 'PNG')
                        $img_r = imagecreatefrompng($src);
                    if ($ext == 'gif' || $ext == 'GIF')
                        $img_r = imagecreatefromgif($src);

                    $dst_r = ImageCreateTrueColor($targ_w, $targ_h);
                    # simpan hasil croping pada folder lain
                    $path_img_crop = realpath(FCPATH . 'assets/uploads/solution_list/' . $do_insert->id);
                    # nama gambar yg di crop
                    # proses copy
                    imagecopyresampled($dst_r, $img_r, 0, 0, $x, $y, $targ_w, $targ_h, $targ_w, $targ_h);
                    # buat gambar
                    if (!imagejpeg($dst_r, $path_img_crop . '/' . $img_name_crop, $jpeg_quality)) {
                        $this->model_basic->delete($this->tbl_campaign, 'id', $do_insert->id);
                        $this->delete_folder('solution_list/' . $do_insert->id);
                        $this->returnJson(array('status' => 'error', 'msg' => 'Upload Falied'));
                    } else {
                        $this->makeThumbnails($path_img_crop . '/', $img_name_crop, 432, 269);
                        $this->delete_temp('temp_folder');
                        $this->returnJson(array('status' => 'ok', 'msg' => 'Input data success', 'redirect' => $redirect));
                    }
                } else {
                    $this->returnJson(array('status' => 'ok', 'msg' => 'Input data success', 'redirect' => $redirect));
                }
            }
            else
                $this->returnJson(array('status' => 'error', 'msg' => 'Failed when saving data'));
        }
        else
            $this->returnJson(array('status' => 'error', 'msg' => 'Please check the form'));
    }

    function solution_list_edit() {
        $data = $this->get_app_settings();
        $data += $this->controller_attr;
        $data += $this->get_function('Solution List', 'solution_list');
        $data += $this->get_menu();
        $this->check_userakses($data['function_id'], ACT_UPDATE);
        
        $images = $this->input->post('images');
        $img_name_crop = uniqid() . '-solutions.jpg';
        $foto = $this->input->post('photo');
        $old_foto = $this->input->post('old_photo');
        $table_field = $this->db->list_fields($this->tbl_solutions);
        $update = array();
        foreach ($table_field as $field) {
            $update[$field] = $this->input->post($field);
        }
        unset($update['date_created']);
        $update['date_modified'] = date('Y-m-d H:i:s', now());
        if ($images) {
            if (!is_dir(FCPATH . "assets/uploads/solution_list/" . $update['id']))
                mkdir(FCPATH . "assets/uploads/solution_list/" . $update['id']);
            $content = $update['content'];
            foreach ($images as $im) {
                if (strpos($content, $im) !== false) {
                    $new_im = 'assets/uploads/solution_list/' . $update['id'] . '/' . basename($im);
                    if ($im != $new_im)
                        @copy($im, $new_im);
                    $content = str_replace($im, $new_im, $content);
                }
                else
                    @unlink($im);
            }
            $update['content'] = $content;
            $this->delete_temp('temp_folder');
        }
        if (($foto && (basename($foto) != $old_foto)) || ($this->input->post('x') || $this->input->post('y') || $this->input->post('w') || $this->input->post('h')))
            $update['photo'] = $img_name_crop;
        else
            $update['photo'] = $this->input->post('old_photo');

        if ($update['id'] && $update['title']) {
            $do_update = $this->model_basic->update($this->tbl_solutions, $update, 'id', $update['id']);
            if ($do_update) {
                if (($foto && (basename($foto) != $old_foto)) || ($this->input->post('x') || $this->input->post('y') || $this->input->post('w') || $this->input->post('h'))) {
                    $origw = $this->input->post('origwidth');
                    $origh = $this->input->post('origheight');
                    $fakew = $this->input->post('fakewidth');
                    $fakeh = $this->input->post('fakeheight');
                    $x = $this->input->post('x') * $origw / $fakew;
                    $y = $this->input->post('y') * $origh / $fakeh;
                    # ambil width crop
                    $targ_w = $this->input->post('w') * $origw / $fakew;
                    # abmil heigth crop
                    $targ_h = $this->input->post('h') * $origh / $fakeh;
                    # rasio gambar crop
                    $jpeg_quality = 100;
                    if (!is_dir(FCPATH . 'assets/uploads/solution_list/' . $update['id']))
                        mkdir(FCPATH . 'assets/uploads/solution_list/' . $update['id']);

                    if (basename($foto) && $foto != null)
                        $src = $this->input->post('photo');
                    else if ($this->input->post('x') || $this->input->post('y') || $this->input->post('w') || $this->input->post('h'))
                        $src = "assets/uploads/solution_list/" . $update['id'] . '/' . $old_foto;
                    # inisial handle copy gambar
                    $ext = pathinfo($src, PATHINFO_EXTENSION);

                    if ($ext == 'jpg' || $ext == 'jpeg' || $ext == 'JPG' || $ext == 'JPEG')
                        $img_r = imagecreatefromjpeg($src);
                    if ($ext == 'png' || $ext == 'PNG')
                        $img_r = imagecreatefrompng($src);
                    if ($ext == 'gif' || $ext == 'GIF')
                        $img_r = imagecreatefromgif($src);

                    $dst_r = ImageCreateTrueColor($targ_w, $targ_h);
                    # simpan hasil croping pada folder lain
                    $path_img_crop = realpath(FCPATH . "assets/uploads/solution_list/" . $update['id']);
                    # nama gambar yg di crop
                    # proses copy
                    imagecopyresampled($dst_r, $img_r, 0, 0, $x, $y, $targ_w, $targ_h, $targ_w, $targ_h);
                    # buat gambar
                    if (imagejpeg($dst_r, $path_img_crop . '/' . $img_name_crop, $jpeg_quality)) {
                        $this->makeThumbnails($path_img_crop . '/', $img_name_crop, 432, 269);
                        @unlink('assets/uploads/solution_list/' . $update['id'] . '/' . $this->input->post('old_photo'));
                        @unlink('assets/uploads/solution_list/' . $update['id'] . '/thumb' . $this->input->post('old_photo'));
                    }
                    $this->delete_temp('temp_folder');
                }
                $redirect = $data['controller'] . '/solution_list/' . $update['id'];
                $this->returnJson(array('status' => 'ok', 'msg' => 'Update success', 'redirect' => $redirect));
            }
            else
                $this->returnJson(array('status' => 'error', 'msg' => 'Failed when updating data'));
        }
        else
            $this->returnJson(array('status' => 'error', 'msg' => 'Please complete the form'));
    }

    function solution_list_delete() {
        $data = $this->get_app_settings();
        $data += $this->controller_attr;
        $data += $this->get_function('Solution List', 'solution_list');
        $data += $this->get_menu();
        $this->check_userakses($data['function_id'], ACT_DELETE);
        $id = $this->input->post('id');
        $do_delete = $this->model_basic->delete($this->tbl_solutions, 'id', $id);
        if ($do_delete) {
            $this->delete_folder('solution_list/' . $id);
            $this->returnJson(array('status' => 'ok', 'msg' => 'Delete Success', 'redirect' => $data['controller'] . '/' . $data['function']));
        }
        else
            $this->returnJson(array('status' => 'error', 'msg' => 'Delete Failed'));
    }
}