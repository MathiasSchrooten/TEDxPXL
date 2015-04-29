<?php
class Categories_model extends CI_Model {

	function getCategories(){
		// $query=$this->db->get('Categories');
		
		// return $query->result();
		
		$query1 = $this->db->get('Categories');
		$query2 = $this->db->query("SELECT COUNT(*) AS rowCount FROM Posts");
		
		$return array('categories' => $query1, 'count' => $query2);
	}
	
	function searchCategories($search){
		return $query->result();
	}
	public function update($id,$data){
		$this->db->where('id', $id);
		$this->db->update('Categories', $data);
	}

	public function delete($id){
		$this->db->where('id', $id);
		$this->db->delete('Categories');
	}

	public function insert($data){
		$this->db->insert('Categories', $data);
	}
}
?>
