<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Categories extends CI_Controller {
	
	public function index(){
		$this->load->database();
		$this->load->model("Categories_model");

		$results=$this->Categories_model->getCategories();
		
		$data=array('results'=>$results);

		$this->load->view('Categories_view',$data); 
	}

}
