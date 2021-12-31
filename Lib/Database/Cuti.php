<?php namespace Lib\Database;
require_once 'Db.php';

class Cuti extends Db{
	public function __construct(){
		parent::__construct();
	}

	public function getByNip($nip){
		$sql = "SELECT * from cuti where nip='$nip'";
		return $this->conn->query($sql);
	}

	public function delete($id, $nip){
		$sql = "DELETE from cuti where nip='$nip' and id_cuti='$id'";
		return $this->conn->query($sql);
	}

	public function save($nip, $jenis_cuti, $alasan, $tgl_mulai, $tgl_selesai){
		$sql = "INSERT INTO cuti(nip, jenis_cuti, alasan, tgl_a, tgl_b) VALUES('$nip', '$jenis_cuti', '$alasan', '$tgl_mulai', '$tgl_selesai')";

		return $this->conn->query($sql);
	}
}