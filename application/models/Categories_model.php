<?php
class Categories_model extends CI_Model {

	function getCategories(){

		$this->db->select('Categories.CategorieId, Categories.Name, COUNT(posts.PostId) AS catCount');
		$this->db->from('categories');
		$this->db->join('posts', 'categories.CategorieId = posts.CategorieId', 'left');
		$this->db->group_by('CategorieId');

		$query = $this->db->get();

		return $query->result();

	}

	function searchCategories($search){
		$query = $this->db->query("SELECT * FROM categories WHERE name LIKE '%$search%'");
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
