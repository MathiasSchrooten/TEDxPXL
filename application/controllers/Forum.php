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
	
	public function insert(){
		if (isset($_POST["action"])){ // && $_POST["action"]=="insert" 
			$data=[];
			$data["title"]=$_POST["title"];
			$data["description"]=$_POST["description"];
			$data["userId"]=$_POST["postedBy"];
			$data["categorieId"]=$_POST["categorieId"];

			$this->load->model("forum_model");
			
			$this->forum_model->insert($data); 
			redirect(base_url().index_page().'/forum/' . $data["categorieId"], 'refresh');
		}
		else
		{
			$data['catId'] = $this->uri->segment(3);
			$this->load->view('foruminsert_view', $data);			
		}
	}
}
