<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Forum extends CI_Controller {

	public function index(){
		$this->load->helper(array('form'));
		$this->load->database();
		$this->load->model("forum_model");

		$results=$this->forum_model->getPosts();

		$data=array('results'=>$results);

		$this->load->view('forum_view',$data);

	}

	public function getForum()
	{
		if($this->uri->segment(2) !== '0'){
		$catId = $this->uri->segment(2);

		$this->load->database();
		$this->load->model("forum_model");

		$results=$this->forum_model->getPostsById($catId);

		$data=array('results'=>$results);

		$this->load->view('forum_view',$data);
	}
	else {
		redirect('categories','refresh');
	}
	}

	public function insert(){
		$this->load->helper(array('form'));
		$data['catId'] = $this->uri->segment(3);
		$this->load->view('foruminsert_view', $data);
	}
}
