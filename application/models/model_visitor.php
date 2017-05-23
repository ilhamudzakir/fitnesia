<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Model_visitor extends PX_Model {

    public function __construct() {
        parent::__construct();
    }

    function update_counter($id) {
        $this->db->set('counter', 'counter+1', FALSE);
        $this->db->where('id', $id);
        if(!$this->db->update($this->tbl_visitor))
            return FALSE;
        return TRUE;
    }
    
    function get_sum_counter_by_date($date_start, $date_end)
    {
        $this->db->select_sum('counter');
        $this->db->where('date >=', $date_start);
        $this->db->where('date <=', $date_end);
        $query = $this->db->get($this->tbl_visitor);
        return $query->row();
    }
    
    function get_count_by_date($date_start, $date_end)
    {
        $this->db->select('*');
        $this->db->where('date >=', $date_start);
        $this->db->where('date <=', $date_end);
        $query = $this->db->get($this->tbl_visitor);
        return $query->num_rows();
    }

}
