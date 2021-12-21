<?php namespace Lib\Database;
/*
*class mysql connection 
*/ 
class Db{
	private $host;
	private $user;
	private $pass;
	private $db;
	public $conn;
	public function __construct(){
		$this->host 	= 'localhost';
		$this->user 	= 'root';
		$this->pass 	= '';
		$this->db 		= 'simpeg';
		$this->conn = mysqli_connect(
			$this->host,
			$this->user,
			$this->pass,
			$this->db
		) or die(mysql_error());
	}

}