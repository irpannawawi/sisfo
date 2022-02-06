<?php namespace Lib\Database;
require_once 'Db.php';

class Lampiran extends Db{
	public function __construct(){
		parent::__construct();
	}

	public function getByNip($nip){
		$sql = "SELECT * from lampiran where nip='$nip'";
		return $this->conn->query($sql);
	}

	public function getPengajuanCuti(){

		$sql = "SELECT cuti.*, pegawai.*  from cuti inner join pegawai on cuti.nip=pegawai.nip where cuti.status='Menunggu' or cuti.status='Terima'";
		// 
		return $this->conn->query($sql);
	}

	public function terimaCuti($id){
		$sql = "UPDATE cuti SET status='Terima', nip_atasan='".$_SESSION['nip']."' WHERE id_cuti='$id'";
		return $this->conn->query($sql);
	}

	public function tolakCuti($id){
		$sql = "UPDATE cuti SET status='Tolak', nip_atasan='".$_SESSION['nip']."' WHERE id_cuti='$id'";
		return $this->conn->query($sql);
	}

	public function delete($id, $nip){
		$sql = "DELETE from lampiran where nip='$nip' and id_lampiran='$id'";
		return $this->conn->query($sql);
	}

	public function save($nip, $jenis_cuti, $alasan, $tgl_mulai, $tgl_selesai){
		$sql = "INSERT INTO cuti(nip, jenis_cuti, alasan, tgl_a, tgl_b) VALUES('$nip', '$jenis_cuti', '$alasan', '$tgl_mulai', '$tgl_selesai')";

		return $this->conn->query($sql);
	}
}