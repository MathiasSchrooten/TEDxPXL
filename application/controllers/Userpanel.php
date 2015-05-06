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
        public function update(){
		if (isset($_POST["action"])){
			$data=[];
                        $data['UserId']=$_POST['UserId'];
			$data['Email']=$_POST['Email'];
			$data['Password']=$_POST['Password'];
			$data['Firstname']=$_POST['Firstname'];
			$data['Lastname']=$_POST['Lastname'];

			$this->load->model("Userpanel_model");
			
			$this->Userpanel_model->update($data['UserId'],$data); 
			redirect(base_url().index_page().'/userpanel/' . $data['UserId'], 'refresh');
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
