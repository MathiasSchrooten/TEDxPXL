<?php
class EventsDetail_model extends CI_Model {

	function getDetails($id){
		$this->db->join('users', 'users.userId = events.userId');
		$this->db->where('events.eventId', $id);
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
