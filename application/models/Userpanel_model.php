<?php
class Userpanel_model extends CI_Model {
	function getDetails(){
		$query=$this->db->get('users');
		return $query->result();
	}
	
	public function update($id,$data){
		$this->db->where('id', $id);
		$this->db->update('posts', $data);
	}

	public function delete($id){
		$this->db->where('id', $id);
		$this->db->delete('posts');
	}

	public function insert($data){
		$this->db->insert('posts', $data);
	}
}
?>
