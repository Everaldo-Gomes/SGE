<?php

class Database {

	private $host = "localhost";
	private $db_name = "sge";
	private $username = "root";
	// private $password = "pw123";
	private $password = "";
	public  $conn;

	/* abri conexao */
	public function getConnection() {

		$this->conn = null;

		try {
			$this->conn = new PDO("mysql:host=" . $this->host . ";dbname=" . $this->db_name, $this->username, $this->password);
            $this->conn->exec("set names utf8");
        }
		catch(PDOException $exception){
            echo "Connection error: " . $exception->getMessage();
        }
		
        return $this->conn;
    }
}
?>	
