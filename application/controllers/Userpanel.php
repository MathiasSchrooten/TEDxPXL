<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Userpanel extends CI_Controller {
	
	public function index(){
		$this->load->database();
		$this->load->model("userpanel_model");

		$results=$this->userpanel_model->getDetails();

		$data=array('results'=>$results);

		$this->load->view('userpanel_view',$data); 
	}
}
