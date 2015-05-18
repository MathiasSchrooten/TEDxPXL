<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class VerifyRegister extends CI_Controller {

 function __construct()
 {
   parent::__construct();
   $this->load->model('User_model','',TRUE);
 }

 function index()
 {
   //This method will have the credentials validation
   $this->load->library('form_validation');

   $this->form_validation->set_rules('email', 'Email', 'trim|required');
   $this->form_validation->set_rules('username', 'Username', 'trim|required');
   $this->form_validation->set_rules('password', 'Password', 'trim|required|callback_insert_database');

   if($this->form_validation->run() == FALSE)
   {
     //Field validation failed.  User redirected to register page
     $this->load->view('register_view');
   }
   else
   {
     //Go to private area

     //redirect('home', 'refresh');
   }

 }
 function insert_database()
 {
   $this->load->helper(array('form'));
   //if (isset($_POST["action"])){ // && $_POST["action"]=="insert"
     $data=[];
     $data["username"]=$_POST["username"];
     $data["password"]=$_POST["password"];
     $data["email"]=$_POST["email"];
     $this->load->model("user_model");

     //login_with_new_user($this->user_model->insert($data), $data["username"]);
     $sess_array = array(
       'id' => $this->user_model->insert($data),
       'username' => $data["username"]
     );
     $this->session->set_userdata('logged_in', $sess_array);
     redirect(base_url().index_page().'/userpanel', 'refresh');

   //}
   //else
   //{
     //$data['postId'] = $this->uri->segment(3);
     //$this->load->view('posts_view', $data);
   //}
 }
 function login_with_new_user($id, $username)
 {
   $sess_array = array(
     'id' => $id,
     'username' => $username
   );
   $this->session->set_userdata('logged_in', $sess_array);
 }
}
