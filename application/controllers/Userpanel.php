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
                            $data = array(
                                    'UserId'        => $this->input->post('UserId'),
                                    'Username'     => $this->input->post('Username'),
                                    'Password'           => $this->input->post('Password'),
                                    'Email'            => $this->input->post('Email'),
                                    'Firstname'     => $this->input->post('Firstname'),
                                    'Lastname'     => $this->input->post('Lastname'),
                                    'Role'      => $this->input->post('Role'),
                                    'Picture'          => $this->input->post('Picture'),
);

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
