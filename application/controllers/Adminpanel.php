<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Adminpanel extends CI_Controller {
  public function index(){
  		$this->load->database();
  		$this->load->model("adminpanel_model");

  		$results1=$this->adminpanel_model->getUsers();
		$results2=$this->adminpanel_model->getEvents();
		$results3=$this->adminpanel_model->getCategories();

		$data["users"]=array('users'=>$results1);
		$data["events"] =array('events'=>$results2);
		$data["categories"] =array('categories'=>$results3);

  		$this->load->view('adminpanel_view',$data);
  }

  public function edit(){
  		$this->load->database();
  		$this->load->model("adminpanel_model");
		$this->load->model("forum_model");

		$what = $this->uri->segment(3);
		$Id = $this->uri->segment(4);

		$this->session->set_userdata('editId', $Id);

		if ($what==='user')
		{
			$results=$this->adminpanel_model->getUserById($Id);
			$data=array('results'=>$results);

			$this->load->view('adminpaneluseredit_view',$data);
		}
		else if ($what==='event')
		{
			$users=$this->adminpanel_model->getUsers();
			$results=$this->adminpanel_model->getEventById($Id);
			$data=array('results'=>$results, 'users'=>$users);

			$this->load->view('adminpaneleventedit_view',$data);
		}
		else if ($what==='category')
		{
			$results=$this->adminpanel_model->getCategoryById($Id);
			$results2=$this->adminpanel_model->getPostsById($Id);
			$results3=$this->adminpanel_model->getComments();
			$data=array('results'=>$results,'posts'=>$results2,'comments'=>$results3);

			$this->load->view('adminpanelcategoryedit_view',$data);
		}
		else if ($what==='post')
		{
			$results=$this->adminpanel_model->getPostById($Id);
			$data=array('results'=>$results);

			$this->load->view('adminpanelpostedit_view',$data);
		}
		else if ($what==='comment')
		{
			$results=$this->adminpanel_model->getCommentById($Id);
			$data=array('results'=>$results);

			$this->load->view('adminpanelcommentedit_view',$data);
		}
  }

  public function insert(){
		$this->load->database();
  		$this->load->model("adminpanel_model");

		$what = $this->uri->segment(3);

		if ($what==='event')
		{
			$users=$this->adminpanel_model->getUsers();
			$data=array('users'=>$users);

			$this->load->view('adminpaneleventinsert_view',$data);
		}
		else if ($what==='category')
		{
			$this->load->view('adminpanelcategoryinsert_view');
		}
  }

  public function deleteComment() {
	  $CommentId= $this->uri->segment(3);
	  $this->load->model('adminpanel_model');
	  $this->adminpanel_model->deleteComment($CommentId);

	  $Id = $this->session->userdata('editId');

      $results=$this->adminpanel_model->getCategoryById($Id);
	  $results2=$this->adminpanel_model->getPostsById($Id);
	  $results3=$this->adminpanel_model->getComments();
	  $data=array('results'=>$results,'posts'=>$results2,'comments'=>$results3);

	  $this->load->view('adminpanelcategoryedit_view',$data);
  }

  public function deletePost() {
	  $PostId= $this->uri->segment(3);
	  $this->load->model('adminpanel_model');
	  $this->adminpanel_model->deletePost($PostId);

	  $Id = $this->session->userdata('editId');

	  $results=$this->adminpanel_model->getCategoryById($Id);
	  $results2=$this->adminpanel_model->getPostsById($Id);
	  $results3=$this->adminpanel_model->getComments();
	  $data=array('results'=>$results,'posts'=>$results2,'comments'=>$results3);

	  $this->load->view('adminpanelcategoryedit_view',$data);
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

  public function deleteCategory() {
	  $CategorieId= $this->uri->segment(3);
	  $this->load->model('Adminpanel_model');
    $posts = $this->Adminpanel_model->getPostsById($CategorieId);
    foreach ($posts as $p) {
      $this->Adminpanel_model->deletePost($p->PostId);
    }
	  $this->Adminpanel_model->deleteCategory($CategorieId);

	  redirect('adminpanel','refresh');
  }

  public function editCategory() {
		if (isset($_POST["action"])){
			$data["Name"]=$_POST["Name"];

			$this->load->model("adminpanel_model");

			$this->adminpanel_model->editCategory($_POST["CategorieId"],$data);
			redirect(base_url().index_page().'/adminpanel/', 'refresh');
		}
		else
		{
			$this->load->database();
			$this->load->model("adminpanel_model");

			$results1=$this->adminpanel_model->getUsers();
			$results2=$this->adminpanel_model->getEvents();
			$results3=$this->adminpanel_model->getCategories();

			$data["users"]=array('users'=>$results1);
			$data["events"] =array('events'=>$results2);
			$data["categories"] =array('categories'=>$results3);

			$this->load->view('adminpanel_view',$data);
		}
	}

	public function editPost() {
		if (isset($_POST["action"])){
			$data["Description"]=$_POST["Description"];
			$data["Title"]=$_POST["Title"];
			$data["CategorieId"]=$_POST["CategorieId"];
			$data["UserId"]=$_POST["UserId"];

			$this->load->model("adminpanel_model");

			$this->adminpanel_model->editPost($_POST["PostId"],$data);

			//terug
		  $Id = $this->session->userdata('editId');

		  $results=$this->adminpanel_model->getCategoryById($Id);
		  $results2=$this->adminpanel_model->getPostsById($Id);
		  $results3=$this->adminpanel_model->getComments();
		  $data=array('results'=>$results,'posts'=>$results2,'comments'=>$results3);

		  $this->load->view('adminpanelcategoryedit_view',$data);
		}
		else
		{
			$this->load->database();
			$this->load->model("adminpanel_model");

			//terug
		  $Id = $this->session->userdata('editId');

		  $results=$this->adminpanel_model->getCategoryById($Id);
		  $results2=$this->adminpanel_model->getPostsById($Id);
		  $results3=$this->adminpanel_model->getComments();
		  $data=array('results'=>$results,'posts'=>$results2,'comments'=>$results3);

		  $this->load->view('adminpanelcategoryedit_view',$data);
		}
	}

	public function editComment() {
		if (isset($_POST["action"])){
			$data["Text"]=$_POST["Text"];
			$data["PostId"]=$_POST["PostId"];
			$data["UserId"]=$_POST["UserId"];

			$this->load->database();
			$this->load->model("adminpanel_model");

			$this->adminpanel_model->editComment($_POST["CommentId"],$data);

			//terug
		  $Id = $this->session->userdata('editId');

		  $results=$this->adminpanel_model->getCategoryById($Id);
		  $results2=$this->adminpanel_model->getPostsById($Id);
		  $results3=$this->adminpanel_model->getComments();
		  $data=array('results'=>$results,'posts'=>$results2,'comments'=>$results3);

		  $this->load->view('adminpanelcategoryedit_view',$data);
		}
		else
		{
			$this->load->database();
			$this->load->model("adminpanel_model");

			//terug
		  $Id = $this->session->userdata('editId');

		  $results=$this->adminpanel_model->getCategoryById($Id);
		  $results2=$this->adminpanel_model->getPostsById($Id);
		  $results3=$this->adminpanel_model->getComments();
		  $data=array('results'=>$results,'posts'=>$results2,'comments'=>$results3);

		  $this->load->view('adminpanelcategoryedit_view',$data);
		}
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
			$results3=$this->adminpanel_model->getCategories();

			$data["users"]=array('users'=>$results1);
			$data["events"] =array('events'=>$results2);
			$data["categories"] =array('categories'=>$results3);

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
			$results2=$this->adminpanel_model->getEvents();
			$results3=$this->adminpanel_model->getCategories();

			$data["users"]=array('users'=>$results1);
			$data["events"] =array('events'=>$results2);
			$data["categories"] =array('categories'=>$results3);

			$this->load->view('adminpanel_view',$data);
		}
	}

	public function createCategory() {
		if (isset($_POST["action"])){
			$data["Name"]=$_POST["Name"];

			$this->load->model("adminpanel_model");

			$this->adminpanel_model->insertCategory($data);
			redirect(base_url().index_page().'/adminpanel/', 'refresh');
		}
		else
		{
			$this->load->database();
			$this->load->model("adminpanel_model");

			$results1=$this->adminpanel_model->getUsers();
			$results2=$this->adminpanel_model->getEvents();
			$results3=$this->adminpanel_model->getCategories();

			$data["users"]=array('users'=>$results1);
			$data["events"] =array('events'=>$results2);
			$data["categories"] =array('categories'=>$results3);

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
			$results2=$this->adminpanel_model->getEvents();
			$results3=$this->adminpanel_model->getCategories();

			$data["users"]=array('users'=>$results1);
			$data["events"] =array('events'=>$results2);
			$data["categories"] =array('categories'=>$results3);

			$this->load->view('adminpanel_view',$data);
		}
	}
}
