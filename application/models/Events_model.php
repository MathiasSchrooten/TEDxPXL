<?php
class Events_model extends CI_Model {

	function getAll(){
		$query=$this->db->get('events');
		return $query->result();
	}
	
	public function update($id,$data){
		$this->db->where('id', $id);
		$this->db->update('events', $data);
	}

	public function delete($id){
		$this->db->where('id', $id);
		$this->db->delete('events');
	}

	public function insert($data){
		$this->db->insert('events', $data);
	}
}
?>
