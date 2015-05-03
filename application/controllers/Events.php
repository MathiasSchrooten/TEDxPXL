<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Events extends CI_Controller {
	
	public function index(){

        $this->load->database();
		$this->load->model("events_model");

		$results=$this->events_model->getAll();

		$data=array('results'=>$results);

		$this->load->view('events_view',$data); 
	}
	
	public function getEventById() {
		$this->load->database();
		$this->load->model("EventsDetail_model");

		$eventId = $this->uri->segment(2);
		
		$results=$this->EventsDetail_model->getDetails($eventId);

		$data=array('results'=>$results);

		$this->load->view('eventsdetail_view',$data); 
	}
}
