<?php namespace Lib\Database;
require_once 'Db.php';

class Resign extends Db{
	public function __construct(){
		parent::__construct();
	}

	public function getByNip($nip){
		$sql = "SELECT * from resign where nip='$nip'";
		return $this->conn->query($sql);
	}
	public function getPengajuanResign(){

		$sql = "SELECT resign.*, pegawai.*   from resign inner join pegawai on resign.nip=pegawai.nip";
		// 
		return $this->conn->query($sql);
	}

	public function terimaResign($id){
		$user = $this->conn->query("SELECT * FROM resign where id_resign='$id'")->fetch_object();
		$update_status_pegawai = $this->conn->query("UPDATE pegawai SET status_pegawai='Tidak Aktif' WHERE nip='$user->nip'");
		$update_status_user = $this->conn->query("UPDATE user SET status='Tidak Aktif' WHERE nip='$user->nip'");
		$sql = "UPDATE resign SET status='Terima', nip_atasan='".$_SESSION['nip']."' WHERE id_resign='$id'";
		return $this->conn->query($sql);
	}

	public function tolakResign($id){
		$sql = "DELETE FROM resign WHERE id_resign='$id'";
		return $this->conn->query($sql);
	}

	public function delete($id, $nip){
		$sql = "DELETE from cuti where nip='$nip' and id_cuti='$id'";
		return $this->conn->query($sql);
	}

	public function save($nip){
		$sql = "INSERT INTO resign(nip, status) VALUES('$nip', 'Menunggu')";

		return $this->conn->query($sql);
	}
}