<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Search extends CI_Controller {
	public function index(){
		$this->load->database();
		if(isset($_GET["search"]) and isset($_GET["loc"])){

			$this->load->model('Categories_model');
			$res = $this->Categories_model->searchCategories($_GET["search"]);
			$data['cat'] = $res;

			$this->load->model('Comments_model');
			$res = $this->Comments_model->searchComments($_GET["search"]);
			$data['co'] = $res; // TEMPORARY COMMENTS

			$this->load->model('Events_model');
			$res = $this->Events_model->searchEventsTitle($_GET["search"]);
			$data['ev'] = $res;
			$this->load->model('Forum_model');
			$res = $this->Forum_model->searchPostsTitle($_GET["search"]);
			$data['po'] = $res;
			$this->load->model('User_model');
			$res = $this->User_model->searchUsers($_GET["search"]);
			$data['us'] = $res;
			$this->load->view('Search_view', $data);
		}
		else{
			$this->load->view('Search_view');
		}
	}
}
?>
