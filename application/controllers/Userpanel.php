<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Userpanel extends CI_Controller {
	
	public function index(){
		$this->load->database();
		$this->load->model("userpanel_model");

		$session_data = $this->session->userdata('logged_in');
		$results=$this->userpanel_model->getDetails($session_data['id']);

		$data=array('results'=>$results);

		$this->load->view('userpanel_view',$data); 
	}
	public function update(){
		if (isset($_POST["action"])){
			$data=[];
			//$data["UserId"]=$_POST["UserId"];
			$data["Username"]=$_POST["Username"];
			$data["Password"]=$_POST["Password"];
			$data["Email"]=$_POST["Email"];
			$data["Firstname"]=$_POST["Firstname"];
			$data["Lastname"]=$_POST["Lastname"];
			$data["Role"]=$_POST["Role"];
			$data["Picture"]=$_POST["Picture"];
			$data["Signature"]=$_POST["Signature"];
			
			$this->load->model("Userpanel_model");
			
			$this->Userpanel_model->update($_POST["UserId"],$data); 
			redirect(base_url().index_page().'/userpanel/', 'refresh');
		}
		else
		{
						$this->load->database();
						$this->load->model('userpanel_model');
						$results=$this->userpanel_model->getDetails();
						$data=array('results'=>$results);
						$this->load->view('userpanel_view', $data);			
		}
	}
}
