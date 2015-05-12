<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Posts extends CI_Controller {

	public function index(){
		$this->load->helper(array('form'));
		$this->load->database();
		$this->load->model("posts_model");

		$postId = $this->uri->segment(2);
		
		$results1=$this->posts_model->getPostsById($postId);
		$results2=$this->posts_model->getCommentsById($postId);
		
		$data["posts"]=array('posts'=>$results1);
		$data["comments"]=array('comments'=>$results2);

		$this->load->view('posts_view',$data);

	}

	public function insert(){
		$this->load->helper(array('form'));
		if (isset($_POST["action"])){ // && $_POST["action"]=="insert"
			$data=[];
			$data["text"]=$_POST["text"];
			$data["postId"]=$_POST["postId"];
			$data["userId"]=$_POST["postedBy"];

			$this->load->model("posts_model");

			$this->posts_model->insert($data);
			redirect(base_url().index_page().'/posts/' . $data["postId"], 'refresh');
		}
		else
		{
			$data['postId'] = $this->uri->segment(3);
			$this->load->view('postsinsert_view', $data);
		}
	}
}
