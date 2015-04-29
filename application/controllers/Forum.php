<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Forum extends CI_Controller {
	
	public function index(){
		$this->load->database();
		$this->load->model("forum_model");

		$results=$this->forum_model->getPosts();

		$data=array('results'=>$results);

		$this->load->view('forum_view',$data); 
	}
	
	public function getForum() 
	{
		$catId = $this->uri->segment(2);
		
		$this->load->database();
		$this->load->model("forum_model");

		$results=$this->forum_model->getPostsById($catId);

		$data=array('results'=>$results);

		$this->load->view('forum_view',$data); 
	}
}
