<?php
class Adminpanel_model extends CI_Model {
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

	public function deleteEvent($EventId){
	  $this->db->Where('EventId', $EventId);
	  $this->db->delete('events');
	}
	
	public function editUser($UserId,$data) {
		$this->db->Where('UserId', $UserId);
		$this->db->update('users', $data);
	}
	
	public function editEvent($EventId,$data) {
		$this->db->Where('EventId', $EventId);
		$this->db->update('events', $data);
	}
}
?>
