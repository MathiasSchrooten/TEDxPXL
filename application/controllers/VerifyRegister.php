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

 }
 function insert_database()
 {
   $this->load->helper(array('form'));
     $data=[];
     $data["username"]=$_POST["username"];
     $data["password"]=$_POST["password"];
     $data["email"]=$_POST["email"];
     $this->load->model("user_model");

     $sess_array = array(
       'id' => $this->user_model->insert($data),
       'username' => $data["username"],
	   'register' => true
     );
     $this->session->set_userdata('logged_in', $sess_array);
     redirect(base_url().index_page().'/userpanel', 'refresh');

 }
 function login_with_new_user($id, $username)
 {
   $sess_array = array(
     'id' => $id,
     'username' => $username,
	 'register' => true
   );
   $this->session->set_userdata('logged_in', $sess_array);
 }
}
