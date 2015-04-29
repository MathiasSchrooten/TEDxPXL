<?php
class Categories_model extends CI_Model {

	function getCategories(){
		$query=$this->db->get('Categories');
		return $query->result();
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
