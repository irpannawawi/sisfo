<?php namespace Lib\Database;
require_once 'Db.php';

class Master extends Db{
	public function __construct(){
		parent::__construct();
	}

	public function getJabatan(){
		$sql = "SELECT * FROM jabatan where jenis='Jabatan'";
		return 
			$this->conn->query($sql);
	}
	public function getSk(){
		$sql = "SELECT * FROM sk";
		return 
			$this->conn->query($sql);
	}

	public function getPangkat(){
		$sql = "SELECT * FROM jabatan where jenis='Pangkat'";
		return 
			$this->conn->query($sql);
	}

	public function getStatus(){
		$sql = "SELECT * FROM jabatan where jenis='Status'";
		return 
			$this->conn->query($sql);
	}
	
	public function getJenis(){
		$sql = "SELECT * FROM jabatan where jenis='Jenis'";
		return 
			$this->conn->query($sql);
	}
	public function getGolonganIjazah(){
		$sql = "SELECT * FROM golongan";
		return 
			$this->conn->query($sql);
	}

	public function saveGolonganIjazah( $golongan, $keterangan, $id=null){
		if ($id===null) {
			$sql = "INSERT INTO golongan(golongan, keterangan) VALUES('$golongan','$keterangan')";
		}else{
			$sql = "UPDATE golongan SET golongan='$golongan', keterangan='$keterangan' WHERE id='$id'";
		}
		return 
			$this->conn->query($sql);
	}

	public function saveJabatan( $nama, $id=null){
		if ($id===null) {
			$sql = "INSERT INTO jabatan(nama, jenis) VALUES('$nama','Jabatan')";
		}else{
			$sql = "UPDATE jabatan SET nama='$nama' WHERE id='$id'";
		}
		return 
			$this->conn->query($sql);
	}

	public function savePangkat( $nama, $id=null){
		if ($id===null) {
			$sql = "INSERT INTO jabatan(nama, jenis) VALUES('$nama','Pangkat')";
		}else{
			$sql = "UPDATE jabatan SET nama='$nama' WHERE id='$id'";
		}
		return 
			$this->conn->query($sql);
	}

	public function saveStatus( $nama, $id=null){
		if ($id===null) {
			$sql = "INSERT INTO jabatan(nama, jenis) VALUES('$nama','Status')";
		}else{
			$sql = "UPDATE jabatan SET nama='$nama' WHERE id='$id'";
		}
		return 
			$this->conn->query($sql);
	}

	public function saveJenis( $nama, $id=null){
		if ($id===null) {
			$sql = "INSERT INTO jabatan(nama, jenis) VALUES('$nama','Jenis')";
		}else{
			$sql = "UPDATE jabatan SET nama='$nama' WHERE id='$id'";
		}
		return 
			$this->conn->query($sql);
	}

	public function save( $nama, $id=null){
		if ($id===null) {
			$sql = "INSERT INTO jabatan(nama, jenis) VALUES('$nama','Jenis')";
		}else{
			$sql = "UPDATE jabatan SET nama='$nama' WHERE id='$id'";
		}
		return 
			$this->conn->query($sql);
	}

	public function saveSk( $keterangan, $id=null){
		if ($id===null) {
			$sql = "INSERT INTO sk(keterangan) VALUES('$keterangan')";
		}else{
			$sql = "UPDATE sk SET keterangan='$keterangan' WHERE id='$id'";
		}
		return 
			$this->conn->query($sql);
	}

	public function deleteGolonganIjazah($id){
		$sql = "DELETE FROM golongan WHERE id=$id";
		return 
			$this->conn->query($sql);
	}

	public function delete($id){
		$sql = "DELETE FROM jabatan WHERE id=$id";
		return 
			$this->conn->query($sql);
	}

	public function deleteSk($id){
		$sql = "DELETE FROM sk WHERE id=$id";
		return 
			$this->conn->query($sql);
	}

}