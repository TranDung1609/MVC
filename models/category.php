<?php
class Category extends DB
{
  protected $db;

  public function __construct()
  {
    $this->db = new DB();
    $this->db->connect();
  }

  public function insertCategory($name, $status)
  {
    $this->db->conn->real_escape_string($name);
    $sql = "INSERT INTO categories (name, status)
							VALUES ('$name', '$status')";
    $this->db->conn->query($sql);
  }
  
  public function listCategory()
  {
    $sql = "SELECT * FROM categories";
    $result = $this->db->conn->query($sql);
    return $result;
  }

  public function getCategory($id)
  {
    $sql = "SELECT * FROM categories WHERE id = $id";
		$result = $this->db->conn->query($sql);
		return $result;
  }

  public function editCate($name, $status, $id)
	{
		$sql = "UPDATE categories SET name = '$name', status = '$status' WHERE id = $id";
		$result = $this->db->conn->query($sql);
    return $result;
	}
  
  public function deleteCategory($id){
    $sql = "DELETE FROM categories WHERE id = $id";
    $result = $this->db->conn->query($sql);
    return $result;
  }
}
