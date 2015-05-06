<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {
  public function index(){


  		$this->load->database();
  		$this->load->model("adminpanel_model");

  		$results=$this->adminpanel_model->getDetails();

  		$data=array('results'=>$results);

  		$this->load->view('adminpanel_view',$data);

  }
}
