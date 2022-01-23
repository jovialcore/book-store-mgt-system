<?php
class DbConnection {
	private $host = "localhost";
	private $dbname = "nk_book_store";
	private $username = "root";
	private $password = "";
	public $connection;

	public function __construct() {
		try {
			$this->connection = new PDO('mysql:host='.$this->host.';dbname='.$this->dbname, $this->username, $this->password);
		} catch(PDOException $ex) {
			echo $ex->getMessage();
		}
	}
}
?>