<?php
class Events_model extends CI_Model {

	function getAll(){
		$query=$this->db->get('events');
		return $query->result();
	}
}
?>
