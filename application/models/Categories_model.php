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

	function getCategoryById($id){
		$this->db->where('CategorieId', $id);
		$query=$this->db->get('categories');

		return $query->result();
	}

	function searchCategories($search){
		$query = $this->db->query("SELECT * FROM categories WHERE name LIKE '%".$this->db->escape_like_str($search)."%'");
		return $query->result();
	}
}
?>
