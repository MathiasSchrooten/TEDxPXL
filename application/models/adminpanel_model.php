<?php
class Adminpanel_model extends CI_Model {
	function getUsers(){
		$query=$this->db->get('users');
		return $query->result();
	}
	function getEvent() {
		$this->db->join('users', 'events.UserId = users.UserId');
		$query=$this->db->get('events');
		
		
		return $query->result();
	}
	

	public function update($id,$data){
		$this->db->where('id', $id);
		$this->db->update('posts', $data);
	}

	public function deleteUser($UserId){
	  $this->db->Where('UserId', $UserId);
	  $this->db->delete('users');
	}

	public function insert($data){
		$this->db->insert('posts', $data);
	}
	public function editUser($UserId,$data) {
		$this->db->Where('UserId', $UserId);
		$this->db->update('users', $data)
	}
}
?>
