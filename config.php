<?php
class DB
{
	public $conn = NULL;
	private $server = 'localhost';
	private $dbName = 'mvc_php';
	private $user = 'root';
	private $password = '';
        
        // Hàm kết nối CSDL
	public function connect()
	{
		$this->conn = new mysqli($this->server, $this->user, $this->password, $this->dbName);

		if ($this->conn->connect_error) {
			printf($this->conn->connect_error);
			exit();
		}
		$this->conn->set_charset("utf8");
	}
        // Hàm đóng kết nối CSDL
        public function closeDatabase()
	{
		if ($this->conn) {
			$this->conn->close();
		}
	}
}

// {
//     private static $instance = NULl;
//     public static function connect() {
//       if (!isset(self::$instance)) {
//         try {
//           self::$instance = new PDO('mysql:host=localhost;dbname=mvc_php', 'root', '');
//           self::$instance->exec("SET NAMES 'utf8'");
//         } catch (PDOException $ex) {
//           die($ex->getMessage());
//         }
//       }
//       return self::$instance;
//     }
// }