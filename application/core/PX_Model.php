<?php if(!defined('BASEPATH')) exit('No direct script access allowed');

class PX_Model extends CI_Model {

    function __construct() {
        parent::__construct();
		// DEFAULT TIME ZONE
		date_default_timezone_set('Asia/Jakarta');
		// TABLE 
		$this->tbl_prefix = 'px_';
                $this->tbl_adm_config = $this->tbl_prefix . 'adm_config';
                $this->tbl_album = $this->tbl_prefix . 'album';
                $this->tbl_album_files = $this->tbl_prefix . 'album_files';
                $this->tbl_banner = $this->tbl_prefix . 'banner';
                $this->tbl_master_data = $this->tbl_prefix . 'master_data';
                $this->tbl_menu = $this->tbl_prefix . 'menu';
                $this->tbl_news = $this->tbl_prefix . 'news';
                $this->tbl_static_content = $this->tbl_prefix . 'static_content';
                $this->tbl_user = $this->tbl_prefix . 'user';
                $this->tbl_useraccess = $this->tbl_prefix . 'useraccess';
                $this->tbl_usergroup = $this->tbl_prefix . 'usergroup';
                $this->tbl_underconstruct_status = $this->tbl_prefix. 'underconstruct_status';
                $this->tbl_solutions = $this->tbl_prefix. 'solutions';
                $this->tbl_become_partners = $this->tbl_prefix. 'become_partners';
                $this->tbl_contact_us = $this->tbl_prefix. 'contact_us';
                $this->tbl_visitor = $this->tbl_prefix. 'visitor';
                $this->tbl_meta_data = $this->tbl_prefix. 'meta_data';
    }
}
