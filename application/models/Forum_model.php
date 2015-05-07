<?php
class Forum_model extends CI_Model {

	function getPosts(){
		$query=$this->db->get('posts');
		return $query->result();
	}

	function getPostsById($id)
	{
		$this->db->join('users', 'posts.UserId = users.UserId', 'right');
		$this->db->join('categories', 'categories.CategorieId = posts.CategorieId');
		$this->db->where('posts.CategorieId', $id);
		$query=$this->db->get('posts');
		return $query->result();
	}
	function searchPosts($search){
		$query = $this->db->query("SELECT * FROM posts WHERE title LIKE '%$search%' or description LIKE '%$search%'");
		return $query->result();
	}
	public function update($id,$data){
		$this->db->where('id', $id);
		$this->db->update('posts', $data);
	}

	public function delete($id){
		$this->db->where('id', $id);
		$this->db->delete('posts');
	}

	public function insert($data){
		$this->db->insert('posts', $data);
	}
}
?>
