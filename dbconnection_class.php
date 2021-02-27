<?php
class DBConnect{

	public $servername = "localhost";
	public $username = "root";
	public $password = "";
	public $dbase = "projectdb";

	function getConnection(){

		$connection = new mysqli($this->servername, $this->username, $this->password,$this->dbase );
		return $connection;
	}
	function execQery($sql){

		$conn = $this->getConnection();
		if ($conn->connect_error) {
  				return null;
			}
		else{
			$result = $conn->query($sql);
			$conn->close();
			return $result;
		}

	}

	
	
}

?>