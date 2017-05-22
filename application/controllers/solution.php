<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Solution extends PX_Controller {

	public function __construct() {
		parent::__construct();
		$this->controller_attr = array('controller' => 'solution','controller_name' => 'Solution');
                $this->do_underconstruct();
	}

	public function index() {
		$data = $this->get_app_settings_frontend();
                $data += $this->controller_attr;
                
		$data['page'] = $this->load->view('frontend/solution/index',$data,true);
		$this->load->view('frontend/layout',$data);
	}

	public function detail($id) {
		$data = $this->get_app_settings_frontend();
                $data += $this->controller_attr;
		
                $solution = $this->model_basic->select_where($this->tbl_solutions, 'id', $id);
                if($solution->num_rows() != 1)
                    redirect('');
                $data['solution'] = $solution->row();
                switch($data['solution']->category_id)
                {
                    case 1:
                        $data['solution']->category = 'Technology';
                        break;
                    case 2:
                        $data['solution']->category = 'Business';
                        break;
                    case 3:
                        $data['solution']->category = 'Industry';
                        break;
                    default:
                        $data['solution']->category = 'Unknown';
                        break;
                }
                
		$data['page'] = $this->load->view('frontend/solution/detail',$data,true);
		$this->load->view('frontend/layout',$data);
	}

}
