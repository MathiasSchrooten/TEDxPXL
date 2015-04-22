<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Events extends CI_Controller {
	
	public function index(){

        $this->load->database();
		$this->load->model("events_model");

		$results=$this->events_model->getAll("events");

		$data=array('results'=>$results);

		$this->load->view('events_view',$data); 
	}

}
