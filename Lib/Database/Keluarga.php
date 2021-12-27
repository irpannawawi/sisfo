<?php namespace Lib\Database;
require_once 'Db.php';

class Keluarga extends Db{
	public function __construct(){
		parent::__construct();
	}

	public function getKeluarga($nip){
		$sql = "SELECT * FROM keluarga WHERE nip='$nip'";
		return $this->conn->query($sql);
	}

	public function insertKeluarga($nip,$nama,$tempat_lahir,$tgl_lahir,$nik,$pekerjaan,$tgl_perkawinan,$ke,$penghasilan) {

				$query		= "INSERT INTO keluarga(nip, nama, tempat, tgl_lahir, nik, pekerjaan, tgl_nikah, ke, penghasilan) VALUES
							   ('$nip','$nama','$tempat_lahir','$tgl_lahir','$nik','$pekerjaan','$tgl_perkawinan','$ke','$penghasilan')";
				
				return $this->conn->query($query);
	}

		// FUNCTION UNTUK MENANGANI PROSES Update
	public function updateKeluarga($id,$nama,$tempat_lahir,$tgl_lahir,$nik,$pekerjaan,$tgl_perkawinan,$ke,$penghasilan) {
		$query		= "UPDATE keluarga SET
								nama		= '$nama',
								tempat 		= '$tempat_lahir',
								tgl_lahir   = '$tgl_lahir',
								nik 		= '$nik',
								pekerjaan 	= '$pekerjaan',
								tgl_nikah 	= '$tgl_perkawinan',
								ke 			= '$ke',
								penghasilan = '$penghasilan'
							   WHERE id	= '$id'
							   ";
		return $this->conn->query($query);
	}
		// FUNCTION UNTUK MENANGANI PROSES DELETE
	public function delete_keluarga() {
				// DARI CONTROLLER
				// MENANGKAP NILAI NIK
		$id			= $_GET['id'];
		$nip		= $_GET['nip'];

		$data = $this->pegawai->dataDeleteKeluarga($id);

				/// DARI VIEW
				// MENGARAHKAN KE FILE VIEW/SELECT.PHP
				// JIKA HASIL PROSES DELETE BERHASIL
		if($data 		== TRUE) {
			echo "<script> 
			window.location = 'index.php?controller=pegawai&method=keluarga&nip=$nip'; 
			</script>";

		} 
				// MENGARAHKAN KE FILE VIEW/SELECT.PHP
				// JIKA HASIL PROSES DELETE GAGAL
		else {
			echo "<script>
			alert('Proses Delete Gagal!'); 
			window.location = 'index.php?controller=pegawai&method=keluarga&nip=$nip'; 
			</script>";
		}
	}

	public function deleteKeluarga($id){
		$sql = "DELETE FROM keluarga WHERE id='$id'";
		return $this->conn->query($sql);
	}

	public function getAnak($nip){
		$sql = "SELECT * FROM anak WHERE nip='$nip'";
		return $this->conn->query($sql);

	}

	public function insertAnak($nip,$nama,$tempat_lahir,$tgl_lahir,$status,$ke,$gender,$tunjangan,$kawin,$bekerja,$sekolah,$putusan){
		$sql		= "INSERT INTO anak(`nip`, `nama`, `tempat`, `tanggal_lahir`, `status`, `ke`, `gender`, `tunjangan`, `kawin`, `bekerja`, `sekolah`, `putusan`) VALUES('$nip','$nama','$tempat_lahir','$tgl_lahir','$status','$ke','$gender','$tunjangan','$kawin','$bekerja','$sekolah','$putusan')";
		return $this->conn->query($sql);
	}

	public function editAnak($id,$nama,$tempat_lahir,$tgl_lahir,$status,$ke,$gender,$tunjangan,$kawin,$bekerja,$sekolah,$putusan){
		$sql		= "UPDATE anak SET
								nama			= '$nama',
								tempat 			= '$tempat_lahir',
								tanggal_lahir   = '$tgl_lahir',
								status 			= '$status',
								ke 				= '$ke',
								gender 			= '$gender',
								tunjangan 		= '$tunjangan',
								kawin 			= '$kawin',
								bekerja 		= '$bekerja',
								sekolah 		= '$sekolah',
								putusan 		= '$putusan'
							   WHERE id	= '$id'
							   ";
		return $this->conn->query($sql);
	}

	public function deleteAnak($id){
		$sql = "DELETE FROM anak WHERE id='$id'";
		return $this->conn->query($sql);
	}
}