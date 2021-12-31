<?php  require_once '../../lib/autoload.php';
use Lib\Database\Keluarga;
$pegawaiObj = new Keluarga;
$id = $_GET['id'];
$nip = $_GET['nip'];
$res = $pegawaiObj->deleteAnak($id);
if($res){
	session_start();
	$_SESSION['updateSuccess'] = True;
	$_SESSION['tabOpen'] = 'dataAnak';
	$target = BASE_URL."/pegawai/data_kepegawaian/detail.php?nip=$nip";
	header("Location: ".$target);
}else{
	$pegawaiObj->conn->error;
}
