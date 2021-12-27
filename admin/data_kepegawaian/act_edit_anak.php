<?php require_once '../../lib/autoload.php';
use Lib\Database\Keluarga;
$keluargaObj 	= new Keluarga;

$id_anak 		= $_POST['id'];	
$nama			= $_POST['nama'];
$tempat_lahir 	= $_POST['tempat'];
$tahun			= $_POST['tahun'];
$bulan 			= $_POST['bulan'];
$hari 			= $_POST['tgl'];
$tgl_lahir  	= $tahun."-".$bulan."-".$hari;
$kawin			= $_POST['kawin'];
$tunjangan		= $_POST['tunjangan'];
$ke				= $_POST['ke'];
$status 		= $_POST['status'];
$bekerja 		= $_POST['bekerja'];
$sekolah		= $_POST['sekolah'];
$putusan 		= $_POST['putusan'];
$gender 		= $_POST['gender'];
$id = $_POST['id_pegawai'];
$res = $keluargaObj->editAnak($id_anak,$nama,$tempat_lahir,$tgl_lahir,$status,$ke,$gender,$tunjangan,$kawin,$bekerja,$sekolah,$putusan);
if($res){
	session_start();
	$_SESSION['insertSuccess']=true;
	$_SESSION['tabOpen'] = 'dataAnak';
	header("Location: ".BASE_URL."/admin/data_kepegawaian/detail.php?id=$id");
}else{
	echo $keluargaObj->conn->error;
}