<?php
class Categories_model extends CI_Model {

	function getCategories(){
		// $query=$this->db->get('Categories');

		// return $query->result();

		$this->db->select('Categories.CategorieId, Categories.Name, COUNT(posts.PostId) AS catCount');
		$this->db->from('categories');
		$this->db->join('posts', 'categories.CategorieId = posts.CategorieId', 'left');
		$this->db->group_by('CategorieId');

		$query = $this->db->get();

		return $query->result();

		// $query1 = $this->db->get('Categories')->result();

		// for ($i = 1 ; $i <= 3 ; $i++)
		// {
			// $query2 = $this->db->query("SELECT COUNT(*) AS rowCount FROM Posts WHERE CategorieId='" . $i ."'")->result();
		// }

		// return array('categories' => $query1, 'count' => $query2);
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
