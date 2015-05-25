
<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class VerifyComment extends CI_Controller {

 function __construct()
 {
   parent::__construct();
   $this->load->model('Posts_model','',TRUE);
 }

 function index()
 {
   //This method will have the credentials validation
   $this->load->library('form_validation');

   $this->form_validation->set_rules('comment', 'Comment', 'trim|required');

   if($this->form_validation->run() == FALSE)
   {
     //Field validation failed.  User redirected to login page
     $data['CatId'] = $this->uri->segment(3);
     if(isset($_POST["CatId"])){
       $data['CatId'] = $_POST["postId"];
     }
     $this->load->helper(array('form'));
 		$this->load->database();
 		$this->load->model("posts_model");

 		$postId = $_POST["postId"];

 		$results1=$this->posts_model->getPostsById($postId);
 		$results2=$this->posts_model->getCommentsById($postId);

 		$data["posts"]=array('posts'=>$results1);
 		$data["comments"]=array('comments'=>$results2);
 		$data['postId'] = $postId;
     $this->load->view('posts_view', $data);
   }
   else
   {

     $data=[];
     $data["text"]=$_POST["comment"];
     $data["postId"]=$_POST["postId"];
     $data["userId"]=$_POST["postedBy"];

     $this->load->model("posts_model");

     $this->posts_model->insert($data);
     redirect(base_url().index_page().'/posts/' . $data["postId"], 'refresh');

   }

 }
}
