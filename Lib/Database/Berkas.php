<?php namespace Lib\Database;
require_once 'Db.php';

class Berkas extends Db{
	public function __construct(){
		parent::__construct();
	}
	public function insert($nip, $keterangan, $tgl,$berkas, $tipe){
		$sql = "INSERT INTO berkas(nip, keterangan, tgl, foto, tipe) VALUES
    							   ('$nip','$keterangan','$tgl','$berkas','file')";
    	return $this->conn->query($sql);
	}
	public function update($id, $keterangan, $tgl,$berkas){
		$sql = "UPDATE berkas SET keterangan='$keterangan', tgl='$tgl', foto='$berkas' WHERE id='$id'";
    	return $this->conn->query($sql);
	}

	public function getBerkasByNip($nip){
		$sql = "SELECT * FROM berkas WHERE nip='$nip'";
		return $this->conn->query($sql);
	}

	public function getBerkasById($id){
		$sql = "SELECT * FROM berkas WHERE id='$id'";
		return $this->conn->query($sql);	
	}

	public function delete($id){
		$sql = "DELETE FROM berkas WHERE id='$id'";
		return $this->conn->query($sql);
	}
}
