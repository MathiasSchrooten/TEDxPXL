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
		$this->db->join('comments', 'posts.PostId = comments.PostId', 'left');
		$this->db->where('posts.CategorieId', $id);
		$this->db->group_by('posts.PostId');

		$this->db->select('posts.PostId, posts.Title, posts.Description, posts.title,
		categories.Name, categories.CategorieId, users.Username, users.UserId, count(comments.CommentId) as comCount');
		$query=$this->db->get('posts');

		return $query->result();
	}

	function searchPosts($search){
		$query = $this->db->query("SELECT * FROM posts WHERE title LIKE '%".$this->db->escape_like_str($search)."%'
		OR description LIKE '%".$this->db->escape_like_str($search)."%'");
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
