<?php namespace Lib\Database;
require_once 'Db.php';

class Berkascapeg extends Db{
	public function __construct(){
		parent::__construct();
	}
	public function insert($id, $jenis, $keterangan, $berkas){
		$sql = "INSERT INTO berkas_capeg(id_capeg, jenis, keterangan, berkas) VALUES
    							   ('$id','$jenis','$keterangan','$berkas')";
    	return $this->conn->query($sql);
	}
	public function update($id, $keterangan, $jenis, $berkas){
		$sql = "UPDATE berkas_capeg SET keterangan='$keterangan', jenis='$jenis', berkas='$berkas' WHERE id='$id'";
    	return $this->conn->query($sql);
	}

	public function getBerkasById($id){
		$sql = "SELECT * FROM berkas_capeg WHERE id_capeg='$id'";
		return $this->conn->query($sql);
	}

	public function getBerkas($id){
		$sql = "SELECT * FROM berkas_capeg WHERE id_berkas='$id'";
		return $this->conn->query($sql);	
	}

	public function delete($id){
		$sql = "DELETE FROM berkas_capeg WHERE id_berkas='$id'";
		return $this->conn->query($sql);
	}
}
