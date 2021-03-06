<?php namespace Lib\Database;
require_once 'Db.php';

class Absensi extends Db{
	public function __construct(){
		parent::__construct();
	}

	public function getByNip($nip, $tgl=null){
		if ($tgl==null) {
			$sql = "SELECT * from absensi where nip='$nip'";
		}else{
			$sql = "SELECT * from absensi where nip='$nip' and tgl='$tgl'";
		}
		return $this->conn->query($sql);

	}
	public function getAbsensi($tgl){
		$sql = "SELECT absensi.*, pegawai.* FROM absensi INNER JOIN pegawai ON absensi.nip=pegawai.nip WHERE tgl='$tgl' ";
		return $this->conn->query($sql);
	}
	public function getAbsensiBulanan($tgl){
		$sql = "SELECT absensi.*, pegawai.* FROM absensi INNER JOIN pegawai ON absensi.nip=pegawai.nip WHERE tgl LIKE '$tgl%' ";
		return $this->conn->query($sql);
	}

	public function getAbsensiById($nip, $tgl){
		$sql = "SELECT absensi.*, pegawai.* FROM absensi INNER JOIN pegawai ON absensi.nip=pegawai.nip WHERE tgl LIKE '$tgl%' AND  absensi.nip='$nip'";
		return $this->conn->query($sql);
	}

	public function absenMasuk($nip, $foto, $keterangan='', $tugas=''){
		$tgl = date('Y-m-d');
		$jam = date('H:i:s');
		$sql = "INSERT INTO absensi(nip, tgl, keterangan, tugas, jam_masuk, foto) VALUES('$nip', '$tgl', '$keterangan', '$tugas', '$jam', '$foto')";
		return $this->conn->query($sql);
	}

	public function absenKeluar($nip){
		$tgl = date('Y-m-d');
		$jam = date('H:i:s');
		$sql = "UPDATE absensi SET jam_keluar='$jam' where nip='$nip' AND tgl='$tgl'";
		return $this->conn->query($sql);
	}
}