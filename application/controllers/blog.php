<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Blog extends PX_Controller {

	public function __construct() {
		parent::__construct();
		$this->controller_attr = array('controller' => 'Blog','controller_name' => 'Blog');
                $this->do_underconstruct();
                $this->check_visitor();
	}

	public function index() {
		$data = $this->get_app_settings_frontend();
                $data += $this->controller_attr;
                $data['count_blog']=$this->model_basic->count($this->tbl_news);
             	$data['blog'] = $this->model_basic->select_all_limit_order_offset($this->tbl_news, 0,8, 'id', 'DESC');
                // echo $this->db->last_query($data['blog']);
                // die();
                
		$data['page'] = $this->load->view('frontend/blog/index',$data,true);
		$this->load->view('frontend/layout',$data);
	}
	public function show_more($offset){
		$blog = $this->model_basic->select_all_limit_order_offset($this->tbl_news, $offset,4, 'id', 'DESC');
		$data='';
		foreach ($blog as $data_row) {
			$data.='<div class="box-blog col-md-3">
    		<a  href="blog/detail/'.$data_row->id.'"><img src="'.base_url().'assets/uploads/news/'.$data_row->id.'/'.$data_row->photo.'"></a>
    		<div class="isi-blog">
    		<!-- <span class="date-blog">'.time_elapsed_string($data_row->date_created).'</span> -->
                <a style="color:black" href="blog/detail/'.$data_row->id.'"><p class="title-blog">'.$data_row->title.'</p></a>
    		<a class="read-more" href="blog/detail/'.$data_row->id.'"><span >Read More ></span></a>
    		</div>
    	</div>';
		}
		$offset=$offset+4;
		echo json_encode(array('data' => $data, 'offset'=>$offset));

	}
	public function detail($id) {
		$data = $this->get_app_settings_frontend();
                $data += $this->controller_attr;
                
                $blog = $this->model_basic->select_where($this->tbl_news, 'id', $id);
                if($blog->num_rows() != 1)
                    redirect('blog');
                $blog->row()->date_created = date('M d, Y', strtotime($blog->row()->date_created));
                $blog->row()->short_desc = limit_words($blog->row()->content, 50);
                $url = base_url().'blog/detail/'.$blog->row()->id;
                $data['sharing_facebook'] = 'https://www.facebook.com/sharer/sharer.php?u='.$url.'&t='.url_title($blog->row()->title);
                $data['sharing_twitter'] = 'https://twitter.com/share?text='.$blog->row()->title.'&url='.$url;
                $data['sharing_google_plus'] = 'https://plus.google.com/share?url='.$url;
                $data['blog'] = $blog->row();
                $data['next_blog'] = $this->model_basic->select_where_limit_order($this->tbl_news, 'id >', $blog->row()->id, 1, 'id', 'ASC');
		$data['prev_blog'] = $this->model_basic->select_where_limit_order($this->tbl_news, 'id <', $blog->row()->id, 1, 'id', 'DESC');
                $data['related_blog'] = $this->model_basic->select_where_limit_order($this->tbl_news, 'category_id', $blog->row()->category_id, 2, 'id', 'DESC')->result();
                
		$data['page'] = $this->load->view('frontend/blog/detail',$data,true);
		$this->load->view('frontend/layout',$data);
	}

}
