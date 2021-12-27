<?php  require_once '../../lib/autoload.php';
use Lib\Database\Keluarga;
$pegawaiObj = new Keluarga;
$id = $_GET['id'];
$id_pegawai = $_GET['id_pegawai'];
$res = $pegawaiObj->deleteAnak($id);
if($res){
	session_start();
	$_SESSION['updateSuccess'] = True;
	$_SESSION['tabOpen'] = 'dataAnak';
	$target = BASE_URL."/admin/data_kepegawaian/detail.php?id=$id_pegawai";
	header("Location: ".$target);
}else{
	$pegawaiObj->conn->error;
}
