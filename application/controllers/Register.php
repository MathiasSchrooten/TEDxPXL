<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Register extends CI_Controller {

	function __construct()
	{
		parent::__construct();
	}

	public function index(){
		$this->load->helper(array('form'));
		$this->load->view('register_view');
	}
	public function insert(){
		$this->load->helper(array('form'));
		if (isset($_POST["action"])){ // && $_POST["action"]=="insert"
			$data=[];
			$data["username"]=$_POST["username"];
			$data["password"]=$_POST["password1"];

			$this->load->model("user_model");

			$this->user_model->insert($data);
		  redirect(base_url().index_page());//.'/posts/' . $data["postId"], 'refresh');

		}
		else
		{
			//$data['postId'] = $this->uri->segment(3);
			//$this->load->view('posts_view', $data);
		}
	}
}
