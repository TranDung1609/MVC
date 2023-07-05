<?php
class Post extends DB
{ 
    protected $db;
    public function __construct()
    {
        $this->db = new DB();
        $this->db->connect();
    }
    public function addPost($user_id, $category_id, $title, $body, $image, $created_at)
    {
        $title = $this->db->conn->real_escape_string($title);
		$body = $this->db->conn->real_escape_string($body);
        $sql = "INSERT INTO posts (user_id, category_id, title, body, image, created_at) 
        VALUES ('$user_id','$category_id','$title','$body','$image','$created_at)";
        $this->db->conn->query($sql);
    }
    public function listPost()
    {
        $sql = "SELECT * FROM posts";
        $result = $this->db->conn->query($sql);
        return $result;
    }
    public function getPost($id)
    {
        $sql = "SELECT * FROM posts WHERE id = $id";
        $result = $this->db->conn->query($sql);
        return $result;
    }
    public function editPost($title, $body, $image, $status, $id)
	{
		$sql = "UPDATE categories SET title = '$title', body = '$body', image = '$image', status = '$status' WHERE id = $id";
		$result = $this->db->conn->query($sql);
    return $result;
	}
    public function deletePost($id)
    {
        $sql = "DELETE FROM posts WHERE id = $id";
        $result = $this->db->conn->query($sql);
        return $result;
    }
}
