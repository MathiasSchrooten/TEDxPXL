
<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class VerifyForum extends CI_Controller {

 function __construct()
 {
   parent::__construct();
   $this->load->model('Forum_model','',TRUE);
 }

 function index()
 {
   //This method will have the credentials validation
   $this->load->library('form_validation');

   $this->form_validation->set_rules('title', 'Title', 'trim|required');
   $this->form_validation->set_rules('description', 'Description', 'trim|required');

   if($this->form_validation->run() == FALSE)
   {
     //Field validation failed.  User redirected to login page
     $data['catId'] = $this->uri->segment(3);
     if(isset($_POST["categorieId"])){
       $data['catId'] = $_POST["categorieId"];
     }
     $this->load->view('foruminsert_view', $data);
   }
   else
   {

     $data=[];
     $data["title"]=$_POST["title"];
     $data["description"]=$_POST["description"];
     $data["userId"]=$_POST["postedBy"];
     $data["categorieId"]=$_POST["categorieId"];
     $this->load->model("forum_model");
     $this->forum_model->insert($data);
     redirect('forum/' . $_POST["categorieId"] , 'refresh');

   }

 }
}
