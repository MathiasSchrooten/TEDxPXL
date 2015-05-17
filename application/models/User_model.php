<?php
class User_model extends CI_Model {
	 function login($username, $password)
	 {
	   $this -> db -> select('*');
	   $this -> db -> from('users');
	   $this -> db -> where('Username', $username);
	   $this -> db -> where('Password', $password);
	   $this -> db -> limit(1);

	   $query = $this -> db -> get();

	   if($query -> num_rows() == 1)
	   {
		 return $query->result();
	   }
	   else
	   {
		 return false;
	   }
	 }
	function searchUsers($search){
		$query = $this->db->query("SELECT * FROM users WHERE username LIKE '%$search%'
			OR firstname LIKE '%$search%' OR lastname LIKE '%$search%' OR email LIKE '%$search%'");
		return $query->result();
	}

	public function insert($data){
		$this->db->insert('users', $data);
		return $this->db->insert_id();
	}
}
?>
