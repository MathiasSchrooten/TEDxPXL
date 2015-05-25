<?php
class Adminpanel_model extends CI_Model {
	function getCategories() {
		$query=$this->db->get('categories');
		return $query->result();
	}
	
	function getCategoryById($CategorieId) {
		$this->db->Where('CategorieId', $CategorieId);
		$query=$this->db->get('categories');
		return $query->result();
	}
	
	function getUsers(){
		$query=$this->db->get('users');
		return $query->result();
	}
	
	function getUserById($UserId){
		$this->db->Where('UserId', $UserId);
		$query=$this->db->get('users');
		return $query->result();
	}
	
	function getEvents() {
		$this->db->join('users', 'events.UserId = users.UserId');
		$query=$this->db->get('events');
		
		return $query->result();
	}
	
	function getEventById($EventId){
		$this->db->Where('EventId', $EventId);
		$query=$this->db->get('events');
		return $query->result();
	}
	
	public function deleteUser($UserId){
	  $this->db->Where('UserId', $UserId);
	  $this->db->delete('users');
	}

	public function deleteCategory($CategorieId){
	  $this->db->Where('CategorieId', $CategorieId);
	  $this->db->delete('categories');
	}
	
	public function deleteEvent($EventId){
	  $this->db->Where('EventId', $EventId);
	  $this->db->delete('events');
	}
	
	public function editCategory($CategorieId,$data) {
		$this->db->Where('CategorieId', $CategorieId);
		$this->db->update('categories', $data);
	}
	
	public function editUser($UserId,$data) {
		$this->db->Where('UserId', $UserId);
		$this->db->update('users', $data);
	}
	
	public function editEvent($EventId,$data) {
		$this->db->Where('EventId', $EventId);
		$this->db->update('events', $data);
	}
	
	public function insertEvent($data) {
		$this->db->insert('events', $data);
	}
	
	public function insertCategory($data) {
		$this->db->insert('categories', $data);
	}
}
?>
