<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Adminpanel extends CI_Controller {
  public function index(){


  		$this->load->database();
  		$this->load->model("adminpanel_model");

  		$results1=$this->adminpanel_model->getUsers();
		$results2=$this->adminpanel_model->getEvent();
		$data["users"]=array('users'=>$results1);
		$data["events"] =array('events'=>$results2);
		

  		$this->load->view('adminpanel_view',$data);

  }
  
  public function deleteUser() {
	  $UserId= $this->uri->segment(3);
	  $this->load->model('Adminpanel_model');
	  $this->Adminpanel_model->deleteUser($UserId);
	  
	  redirect('adminpanel','refresh');
  }
  public function editUser() {
	  $data=[];
			//$data["UserId"]=$_POST["UserId"];
			$data["Username"]=$_POST["Username"];
			$data["Password"]=$_POST["Password"];
			$data["Email"]=$_POST["Email"];
			$data["Firstname"]=$_POST["Firstname"];
			$data["Lastname"]=$_POST["Lastname"];
			$data["Role"]=$_POST["Role"];
			$data["Picture"]= str_replace("./assets/users/", "", $target_file); 
			$data["Signature"]=$_POST["Signature"];
			$data["About"]=$_POST["About"];
			
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
