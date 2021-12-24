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

	public function deleteUser($id){
		$query = "DELETE FROM user WHERE id='$id'";
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

	public function saveUser($data, $id=null){
		if($id==null){
			$sql = "INSERT INTO user(username, nip, password, nama, level, gender, foto, status) VALUES('".$data['username']."', '".$data['nip']."', '".password_hash($data['password'])."', '".$data['namaLengkap']."','".$data['level']."', '".$data['jenisKelamin']."', 'avatar.jpg', 'Aktif' )";
				return $this->conn->query($sql);
		}
	}
}