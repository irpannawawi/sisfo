<?php namespace Lib\Database;
require_once 'Db.php';
class User extends Db{
	public function __construct(){
		parent::__construct();
	}

	public function getUsers(){
		$res = $this->conn->query("select * from user");
		return $res;
	}

	public function getByUsername($username){
		return 
			$this->conn->query("SELECT * FROM user WHERE username='$username'");
	}

	public function createUser($username, $nip, $password, $nama, $level, $gender, $foto, $status){
		$password = password_hash($password);
		$query = 'INSERT INTO user(username, nip, password, nama, level, gender, foto, status)	VALUES("$username", "$nip", "$password", "$nama", "$level", "$gender", "$foto", "$status")';
		return $this->conn->query($query);
	}

	public function updatePassword($username, $new_password){
		$query = "UPDATE user SET password='$new_password' WHERE username='$username'";
		return $this->conn->query($query);  
	}

	public function switcStatus($id){
		$userdata = $this->conn->query("select * from user where id='$id'");
		$user = $userdata->fetch_object();
		if ($user->status == 'Aktif') {
			$status = 'Tidak Aktif';
		}else{
			$status = "Aktif";
		}

		$sql = "UPDATE user SET status='$status' WHERE id='$id'";
		return $this->conn->query($sql);
	}


}