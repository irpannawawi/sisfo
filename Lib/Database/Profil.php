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

	public function save($nama, $instansi, $provinsi, $kota, $alamat, $logo, $bg, $fb, $twitter, $ig,$id=null){
		if($id == null){
			$sql = "INSERT INTO profil(nama, instansi, provinsi, kota, alamat, logo, bg, fb, twitter, ig) VALUES('$nama', '$instansi', '$provinsi', '$kota', '$alamat', '$logo', '$bg', '$fb', '$twitter', '$ig')";
		}else{
			$sql = "UPDATE profil SET nama='$nama', instansi='$instansi', provinsi='$provinsi', kota='$kota', alamat='$alamat', logo='$logo', bg='$bg', fb='$fb', twitter='$twitter', ig='$ig' WHERE id='$id'";
		}
		return $this->conn->query($sql);
	}
}
