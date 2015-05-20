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
			
			$data["Username"]=$_POST["Username"];
			$data["Password"]=$_POST["Password"];
			$data["Email"]=$_POST["Email"];
			$data["Firstname"]=$_POST["Firstname"];
			$data["Lastname"]=$_POST["Lastname"];
			$data["Role"]=$_POST["Role"];
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
