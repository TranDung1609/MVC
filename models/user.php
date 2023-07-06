<?php

class User extends DB
{
	protected $db;

	public function __construct()
	{
		$this->db = new DB();
		$this->db->connect();
	}
	public function register($name, $email, $password)
	{
		$sql = "INSERT INTO users (name, email , password) VALUES ('$name', '$email', '$password')";
		$this->db->conn->query($sql);
	}
	public function checkExists($name, $email)
	{
		$sql = "SELECT * FROM users WHERE name = '$name' AND email = '$email'";
		$result = $this->db->conn->query($sql);
		return $result;
	}
	public function login($email,$password)
	{
		$sql = "SELECT * FROM users WHERE email = '$email'  AND password = '$password' ";
		$result = $this->db->conn->query($sql);
		return $result;
	}

	public function listUser()
	{
		$sql = "SELECT * FROM users";
		$result = $this->db->conn->query($sql);
		return $result;
	}
	public function getUser($id)
	{
		$sql = "SELECT * FROM users WHERE id = $id";
		$result = $this->db->conn->query($sql);
		return $result;
	}
	public function editUser($id, $name, $email)
	{
		$sql = "UPDATE users SET name = '$name', email = '$email' WHERE id = $id";
		$result = $this->db->conn->query($sql);
		return $result;
	}
	public function deleteUser($id)
	{
		$sql = "DELETE FROM users WHERE id = $id";
		$result = $this->db->conn->query($sql);
		return $result;
	}
}
