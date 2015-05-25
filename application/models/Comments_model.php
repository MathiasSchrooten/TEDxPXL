<?php
class Comments_model extends CI_Model {
  function searchComments($search){
		$query = $this->db->query("SELECT * FROM comments WHERE text LIKE '%".$this->db->escape_like_str($search)."%'");
		return $query->result();
	}
}
?>
