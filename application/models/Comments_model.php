<?php
class Comments_model extends CI_Model {
  function searchComments($search){
		$query = $this->db->query("SELECT * FROM comments WHERE text LIKE '%$search%'");
		return $query->result();
	}
}
?>
