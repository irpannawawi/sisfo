<?php namespace Lib\Database;
require_once 'Db.php';
class Capeg extends Db{
	public function __construct(){
		parent::__construct();
	}

	public function getCapeg(){
		$res = $this->conn->query("select * from calon_pegawai");
		return $res;
	}

	public function getByUsername($username){
		return 
			$this->conn->query("SELECT * FROM calon_pegawai WHERE username='$username'");
	}

	public function getById($id){
		return 
			$this->conn->query("SELECT * FROM calon_pegawai WHERE id='$id'");
	}

	public function deleteUser($id){
		$query = "DELETE FROM calon_pegawai WHERE id='$id'";
		return $this->conn->query($query);
	}

	public function updatePassword($username, $new_password){
		$query = "UPDATE calon_pegawai SET password='$new_password' WHERE username='$username'";
		return $this->conn->query($query);  
	}
	public function updateFoto($id, $nama_berkas){
		$query = "UPDATE calon_pegawai SET foto='$nama_berkas' WHERE id='$id'";
		return $this->conn->query($query);  
	}

	public function kirimBerkas(){
		$id = $_SESSION['user_id'];
		$query = "UPDATE calon_pegawai SET pengajuan_berkas='1' WHERE id='$id'";
		return $this->conn->query($query);  
	}

	public function updateUser($id, $username, $nama){
		$query = "UPDATE calon_pegawai SET username='$username', nama='$nama' WHERE id='$id'";
		return $this->conn->query($query);  
	}

	public function switcStatus($id){
		$userdata = $this->conn->query("select * from calon_pegawai where id='$id'");
		$user = $userdata->fetch_object();
		if ($user->status == 'Aktif') {
			$status = 'Tidak Aktif';
		}else{
			$status = "Aktif";
		}

		$sql = "UPDATE calon_pegawai SET status='$status' WHERE id='$id'";
		return $this->conn->query($sql);
	}

	public function saveCapeg($data, $id=null){
		if($id==null){
			$sql = "INSERT INTO calon_pegawai(nama, username, wa, password) VALUES('".$data['nama']."', '".$data['username']."', '".$data['wa']."', '".password_hash($data['password'], PASSWORD_DEFAULT)."')";
				return $this->conn->query($sql);
		}else{
			if ($data['password']!='') {
				$password = password_hash($data['password'], PASSWORD_DEFAULT);
			}else{
				$user = $this->conn->query("select password from user where id='$id'")->fetch_object();
				$password = $user->password;
			}
			$sql = "UPDATE user SET username='".$data['username']."',password='".$password."', nama='".$data['nama']."' WHERE id='".$id."'";
				return $this->conn->query($sql);
		}
	}
}