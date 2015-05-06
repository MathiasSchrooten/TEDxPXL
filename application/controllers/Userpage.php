<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Userpage extends CI_Controller {
	
	public function index(){
		$this->load->database();
		$this->load->model("userpage_model");

		$userId = $this->uri->segment(2);
		
		$results=$this->userpage_model->getDetails($userId);

		$data=array('results'=>$results);

		$this->load->view('userpage_view',$data); 
	}
}
