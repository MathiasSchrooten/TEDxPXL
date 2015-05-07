<?php
class Userpanel_model extends CI_Model {
	function getDetails($id){
		$this->db->where('UserId', $id);
		$query=$this->db->get('users');
		return $query->result();
	}
	
	public function update($id,$data){
		$this->db->where('UserId', $id);
		$this->db->update('users', $data);
	}

	public function delete($id){
		$this->db->where('id', $id);
		$this->db->delete('users');
	}

	public function insert($data){
		$this->db->insert('users', $data);
	}
}
?>
