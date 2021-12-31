<?php require_once '../../lib/autoload.php';
use Lib\Database\Keluarga;
$keluargaObj 	= new Keluarga;


$nip 			= $_POST['nip'];
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
print_r($_POST);
$res = $keluargaObj->insertAnak($nip,$nama,$tempat_lahir,$tgl_lahir,$status,$ke,$gender,$tunjangan,$kawin,$bekerja,$sekolah,$putusan);
if($res){
	session_start();
	$_SESSION['insertSuccess']=true;
	$_SESSION['tabOpen'] = 'dataAnak';
	header("Location: ".BASE_URL."/pegawai/data_kepegawaian/detail.php?nip=$nip");
}else{
	echo $keluargaObj->conn->error;
}