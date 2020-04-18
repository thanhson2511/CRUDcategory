<?php 
	class Connection{
		protected $severname = "localhost";
		protected $username = "root";
		protected $password = "";
		protected $dbname = "php_blog";

		function __construct($table = ""){
			$this->conn = new mysqli($this->severname, $this->username, $this->password, $this->dbname);
			if ($this->conn->connect_error) {
			echo "Ket noi that bai" . $this->conn->connect_error;
			exit();

		}else{
		// echo "Ket noi thanh cong";
			}
			mysqli_set_charset($this->conn,'UTF8');
			$this->table = $table;
		}
	}
 ?>