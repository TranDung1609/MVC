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

        $sql = "INSERT INTO posts (user_id, category_id, title, body, image, created_at) 
        VALUES ('$user_id','$category_id','$title','$body','$image','$created_at')";
        $this->db->conn->query($sql);
    }
    public function listPost()
    {
        $sql= "SELECT posts.id,posts.category_id,posts.title,posts.body,posts.image,users.name as user_name,categories.name as category_name
        from posts 
        inner join users
        on posts.user_id=users.id
        inner join categories
        on posts.category_id=categories.id
        order by id";
        $result = $this->db->conn->query($sql);
        $list = array();
        while ($data = $result->fetch_array()) {
            $list[] = $data;
        }
        return $list;
    }
    
    public function getPost($id)
    {
        $sql= "SELECT posts.id,posts.category_id,posts.title,posts.body,posts.image,users.name as user_name,categories.name as category_name
        from posts 
        inner join users
        on posts.user_id=users.id
        inner join categories
        on posts.category_id=categories.id
        where posts.id = $id";
        $result = $this->db->conn->query($sql);
        return $result;
    }
    public function editPost($id,$category_id,$title, $body,$image )
	{
		$sql = "UPDATE posts SET category_id = '$category_id', title = '$title', body = '$body', image = '$image' WHERE id = $id";
		$result = $this->db->conn->query($sql);
        return $result;
	}
    public function delPost($id){
        $sql = "DELETE FROM posts WHERE id = $id";
        $result = $this->db->conn->query($sql);
        return $result;
      }
}
