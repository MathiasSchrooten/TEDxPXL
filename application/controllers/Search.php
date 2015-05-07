<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Search extends CI_Controller {
	public function index(){
		$this->load->database();
		if(isset($_GET["search"]) and isset($_GET["loc"])){
			
			$this->load->model('Categories_model');
			$res = $this->Categories_model->searchCategories($_GET["search"]);
			$data = array('cat'=> $res);
			$this->load->view('Search_view', $data);
		}
		else{
			$this->load->view('Search_view');
		}
	}
}
?>
