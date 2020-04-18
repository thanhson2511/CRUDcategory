<?php 
	require_once 'Models/Connection.php';
	class Model{
		protected $table;
		private $conn;

		public function __construct(){
			$connection = new Connection();
			$this->conn = $connection->conn;
		}

		public function getAll(){
			$query = "SELECT * FROM ". $this->table;
			$result = $this->conn->query($query);
			$data = [];
			while ($row = $result->fetch_assoc()) {
				$data[] = $row;
			}
			return $data;
		}

		public function add($data){
			$query = "INSERT INTO $this->table (";
			foreach ($data as $key => $value){
				$query .= $key . ",";
			}
			$query = substr_replace($query,")",-1);
			$query .= "VALUE (";
			foreach($data as $key => $value){
				$query .= "'" . $value . "'" . ",";
			}
			$query = substr_replace($query,")",-1);
			$result = $this->conn->query($query);
			return $result;
		}

		public function find($id){
			$query = "SELECT * FROM $this->table WHERE id = $id";
			$result = $this->conn->query($query);
			$row = $result->fetch_assoc();
			return $row;
		}

		public function update($data){
			$query = "UPDATE $this->table SET ";
			foreach ($data as $key => $value){
				$query .= $key . " ='" . $value . "',";
			}
			$query = substr_replace($query,"",-1);
			
			// $query .= "WHERE id =  $data['id']";
			
			$result = $this->conn->query($query);
			return $result;

		}

		public function delete($id){
			$query = "DELETE FROM $this->table WHERE id = $id";
			$result = $this->conn->query($query);
			return $result;
		}
	}
 ?>