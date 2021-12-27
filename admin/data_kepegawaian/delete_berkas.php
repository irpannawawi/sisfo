<?php  require_once '../../lib/autoload.php';
use Lib\Database\Berkas;
$berkasObj = new Berkas;
$id = $_GET['id'];
$id_pegawai = $_GET['id_pegawai'];
$berkasLama = $berkasObj->getBerkasById($id)->fetch_object();
$tujuan = '../../assets/berkas/';
unlink($tujuan.$berkasLama->foto);
$res = $berkasObj->delete($id);
if($res){
	session_start();
	$_SESSION['updateSuccess'] = True;
	$_SESSION['tabOpen'] = 'dataLampiran';
	$target = BASE_URL."/admin/data_kepegawaian/detail.php?id=$id_pegawai";
	header("Location: ".$target);
}else{
	$berkasObj->conn->error;
}
