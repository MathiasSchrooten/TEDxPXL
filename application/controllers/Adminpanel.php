<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Adminpanel extends CI_Controller {
  public function index(){
  		$this->load->database();
  		$this->load->model("adminpanel_model");

  		$results1=$this->adminpanel_model->getUsers();
		$results2=$this->adminpanel_model->getEvents();
		$data["users"]=array('users'=>$results1);
		$data["events"] =array('events'=>$results2);
		

  		$this->load->view('adminpanel_view',$data);
  }
  
  public function edit(){
  		$this->load->database();
  		$this->load->model("adminpanel_model");

		$what = $this->uri->segment(3);
		$Id = $this->uri->segment(4);
		
		if ($what==='user')
		{
			$results=$this->adminpanel_model->getUserById($Id);
			$data=array('results'=>$results);
	
			$this->load->view('adminpaneluseredit_view',$data);
		}
		else
		{
			$users=$this->adminpanel_model->getUsers();
			$results=$this->adminpanel_model->getEventById($Id);
			$data=array('results'=>$results, 'users'=>$users);
	
			$this->load->view('adminpaneleventedit_view',$data);
		}
  }
  
  public function insert(){
		$this->load->database();
  		$this->load->model("adminpanel_model");
		
		$users=$this->adminpanel_model->getUsers();
	    $data=array('users'=>$users);
		
		$this->load->view('adminpaneleventinsert_view',$data);
  }
  
  public function deleteUser() {
	  $UserId= $this->uri->segment(3);
	  $this->load->model('Adminpanel_model');
	  $this->Adminpanel_model->deleteUser($UserId);
	  
	  redirect('adminpanel','refresh');
  }
  
  public function deleteEvent() {
	  $EventId= $this->uri->segment(3);
	  $this->load->model('Adminpanel_model');
	  $this->Adminpanel_model->deleteEvent($EventId);
	  
	  redirect('adminpanel','refresh');
  }
  
  public function editUser() {
		if (isset($_POST["action"])){
			$target_dir = "./assets/users/";
			$target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
			$imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
			$data=[];
			
			if ($imageFileType!==null && $imageFileType!=="")
			{
				$uploadOk = 1;
				echo basename($_FILES["fileToUpload"]["name"]);
				
				// Check if image file is a actual image or fake image
				if(isset($_POST["submit"])) {
					$check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
					if($check !== false) {
						echo "File is an image - " . $check["mime"] . ".";
						$uploadOk = 1;
					} else {
						echo "File is not an image.";
						$uploadOk = 0;
					}
				}
				$index = 0;
				
				while (file_exists($target_file))
				{
					$target_file = str_replace("." . $imageFileType, "", $target_file); 
					$target_file = $target_file . $index;
					$target_file = $target_file . "." . $imageFileType;
					$index++;
				}
				
				// Check if file already exists
				//if (file_exists($target_file)) {
					//echo "Sorry, file already exists.";
					//$uploadOk = 0;
				//}
				
				// Check file size
				if ($_FILES["fileToUpload"]["size"] > 500000) {
					echo "Sorry, your file is too large.";
					$uploadOk = 0;
				}
				// Allow certain file formats
				if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
				&& $imageFileType != "gif" ) {
					echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
					$uploadOk = 0;
				}
				// Check if $uploadOk is set to 0 by an error
				if ($uploadOk == 0) {
					echo "Sorry, your file was not uploaded.";
				// if everything is ok, try to upload file
				} else {
					if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
						echo "The file ". basename( $_FILES["fileToUpload"]["name"]). " has been uploaded.";
					} else {
						echo "Sorry, there was an error uploading your file.";
					}
				}
				
				$data["Picture"]= str_replace("./assets/users/", "", $target_file); 
			}
			else
			{
				$data["Picture"]= $_POST["Picture"]; 
			}
			
			//$data["UserId"]=$_POST["UserId"];
			$data["Username"]=$_POST["Username"];
			$data["Password"]=$_POST["Password"];
			$data["Email"]=$_POST["Email"];
			$data["Firstname"]=$_POST["Firstname"];
			$data["Lastname"]=$_POST["Lastname"];
			$data["Role"]=$_POST["Role"];
			$data["Signature"]=$_POST["Signature"];
			$data["About"]=$_POST["About"];
			
			$this->load->model("adminpanel_model");
			
			$this->adminpanel_model->editUser($_POST["UserId"],$data); 
			redirect(base_url().index_page().'/adminpanel/', 'refresh');
		}
		else
		{
			$this->load->database();
			$this->load->model("adminpanel_model");

			$results1=$this->adminpanel_model->getUsers();
			$results2=$this->adminpanel_model->getEvents();
			$data["users"]=array('users'=>$results1);
			$data["events"] =array('events'=>$results2);
			
			$this->load->view('adminpanel_view',$data);		
		}
	}
	
	public function editEvent() {
		if (isset($_POST["action"])){
			$target_dir = "./assets/events/";
			$target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
			$imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
			$data=[];
			
			if ($imageFileType!==null && $imageFileType!=="")
			{
				$uploadOk = 1;
				echo basename($_FILES["fileToUpload"]["name"]);
				
				// Check if image file is a actual image or fake image
				if(isset($_POST["submit"])) {
					$check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
					if($check !== false) {
						echo "File is an image - " . $check["mime"] . ".";
						$uploadOk = 1;
					} else {
						echo "File is not an image.";
						$uploadOk = 0;
					}
				}
				$index = 0;
				
				while (file_exists($target_file))
				{
					$target_file = str_replace("." . $imageFileType, "", $target_file); 
					$target_file = $target_file . $index;
					$target_file = $target_file . "." . $imageFileType;
					$index++;
				}
				
				// Check if file already exists
				//if (file_exists($target_file)) {
					//echo "Sorry, file already exists.";
					//$uploadOk = 0;
				//}
				
				// Check file size
				if ($_FILES["fileToUpload"]["size"] > 500000) {
					echo "Sorry, your file is too large.";
					$uploadOk = 0;
				}
				// Allow certain file formats
				if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
				&& $imageFileType != "gif" ) {
					echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
					$uploadOk = 0;
				}
				// Check if $uploadOk is set to 0 by an error
				if ($uploadOk == 0) {
					echo "Sorry, your file was not uploaded.";
				// if everything is ok, try to upload file
				} else {
					if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
						echo "The file ". basename( $_FILES["fileToUpload"]["name"]). " has been uploaded.";
					} else {
						echo "Sorry, there was an error uploading your file.";
					}
				}
				
				$data["Image"]= str_replace("./assets/events/", "", $target_file); 
			}
			else
			{
				$data["Image"]= $_POST["Image"]; 
			}
			
			//$data["UserId"]=$_POST["UserId"];
			$data["Title"]=$_POST["Title"];
			$data["Description"]=$_POST["Description"];
			$data["Date"]=$_POST["Date"];
			$data["Time"]=$_POST["Time"];
			$data["UserId"]=$_POST["UserId"];
			$data["Place"]=$place =  str_replace(" ", "+", $_POST["Place"]);
			
			$this->load->model("adminpanel_model");
			
			$this->adminpanel_model->editEvent($_POST["EventId"],$data); 
			redirect(base_url().index_page().'/adminpanel/', 'refresh');
		}
		else
		{
			$this->load->database();
			$this->load->model("adminpanel_model");

			$results1=$this->adminpanel_model->getUsers();
			$results2=$this->adminpanel_model->getEvent();
			$data["users"]=array('users'=>$results1);
			$data["events"] =array('events'=>$results2);
			
			$this->load->view('adminpanel_view',$data);		
		}
	}
	
	public function createEvent() {
		if (isset($_POST["action"])){
			$target_dir = "./assets/events/";
			$target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
			$imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
			$data=[];
			
			if ($imageFileType!==null && $imageFileType!=="")
			{
				$uploadOk = 1;
				echo basename($_FILES["fileToUpload"]["name"]);
				
				// Check if image file is a actual image or fake image
				if(isset($_POST["submit"])) {
					$check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
					if($check !== false) {
						echo "File is an image - " . $check["mime"] . ".";
						$uploadOk = 1;
					} else {
						echo "File is not an image.";
						$uploadOk = 0;
					}
				}
				$index = 0;
				
				while (file_exists($target_file))
				{
					$target_file = str_replace("." . $imageFileType, "", $target_file); 
					$target_file = $target_file . $index;
					$target_file = $target_file . "." . $imageFileType;
					$index++;
				}
				
				// Check if file already exists
				//if (file_exists($target_file)) {
					//echo "Sorry, file already exists.";
					//$uploadOk = 0;
				//}
				
				// Check file size
				if ($_FILES["fileToUpload"]["size"] > 500000) {
					echo "Sorry, your file is too large.";
					$uploadOk = 0;
				}
				// Allow certain file formats
				if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
				&& $imageFileType != "gif" ) {
					echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
					$uploadOk = 0;
				}
				// Check if $uploadOk is set to 0 by an error
				if ($uploadOk == 0) {
					echo "Sorry, your file was not uploaded.";
				// if everything is ok, try to upload file
				} else {
					if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
						echo "The file ". basename( $_FILES["fileToUpload"]["name"]). " has been uploaded.";
					} else {
						echo "Sorry, there was an error uploading your file.";
					}
				}
				
				$data["Image"]= str_replace("./assets/events/", "", $target_file); 
			}
			else
			{
				$data["Image"]= $_POST["Image"]; 
			}
			
			//$data["UserId"]=$_POST["UserId"];
			$data["Title"]=$_POST["Title"];
			$data["Description"]=$_POST["Description"];
			$data["Date"]=$_POST["Date"];
			$data["Time"]=$_POST["Time"];
			$data["UserId"]=$_POST["UserId"];
			$data["Place"]=$place =  str_replace(" ", "+", $_POST["Place"]);
			
			$this->load->model("adminpanel_model");
			
			$this->adminpanel_model->insertEvent($data); 
			redirect(base_url().index_page().'/adminpanel/', 'refresh');
		}
		else
		{
			$this->load->database();
			$this->load->model("adminpanel_model");

			$results1=$this->adminpanel_model->getUsers();
			$results2=$this->adminpanel_model->getEvent();
			$data["users"]=array('users'=>$results1);
			$data["events"] =array('events'=>$results2);
			
			$this->load->view('adminpanel_view',$data);		
		}
	}
}
