<?php namespace Lib\Database;
require_once 'Db.php';

class Profil extends Db{
	public function __construct(){
		parent::__construct();
	}

	public function getProfil(){
		$sql = "SELECT * FROM profil";
		return $this->conn->query($sql);
	}

}
