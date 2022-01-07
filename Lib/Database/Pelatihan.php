<?php namespace Lib\Database;
require_once 'Db.php';

class Pelatihan extends Db{
	public function __construct(){
		parent::__construct();
	}

	// CREATE PELATIHAN
	// UPDATE PELATIHAN
	public function savePelatihan( $nama, $id=null ){
		if ($id==null) {
			$sql = "INSERT INTO pelatihan(nama_pelatihan) VALUES('$nama')";
		}else{
			$sql = "UPDATE pelatihan SET nama_pelatihan='$nama' WHERE id_pelatihan='$id'";
		}
		return 
		$this->conn->query($sql);
	}
	// READ PELATIHAN
	public function getPelatihan(){
		$sql = "SELECT * FROM pelatihan";
		return 
		$this->conn->query($sql);
	}
	// DELETE PELATIHAN
	public function deletePelatihan($id){
		$sql = "DELETE FROM pelatihan WHERE id_pelatihan='$id'";
		$sql2 = "DELETE FROM pelatihan WHERE id_pelatihan='$id'";
		if($this->conn->query($sql2)){
			return 
			$this->conn->query($sql);
		}else{
			return $this->conn->query($sql2);
		}
	}

	//  =================== KELAS ===============

	// CREATE kelas
	// UPDATE kelas
	public function savePeserta( $nip, $id_pelatihan, $tanggal_berakhir, $id=null ){
		if ($id===null) {
			$sql = "INSERT INTO kelas(nip, id_pelatihan, tanggal_berakhir) VALUES('$nip', '$id_pelatihan', '$tanggal_berakhir')";
		}else{
			$sql = "UPDATE kelas SET nip='$nip', id_pelatihan='$id_pelatihan', tanggal_berakhir='$tanggal_berakhir' WHERE id_kelas='$id'";
		}
		return 
		$this->conn->query($sql);
	}
	// READ kelas
	public function getKelasByPelatihan($id_pelatihan){
		$sql = "SELECT kelas.*, pegawai.* FROM kelas inner join pegawai on kelas.nip=pegawai.nip WHERE id_pelatihan='$id_pelatihan'";
		return 
		$this->conn->query($sql);
	}
	// DELETE kelas
	public function deletePeserta($id){
		$sql = "DELETE FROM kelas WHERE id_kelas='$id'";

		return 
			$this->conn->query($sql);
	}

	public function getAllPegawai(){
		$sql = "SELECT pegawai.* FROM pegawai LEFT OUTER JOIN kelas ON pegawai.nip=kelas.nip WHERE kelas.nip IS NULL";
		return 
			$this->conn->query($sql);

	}
}