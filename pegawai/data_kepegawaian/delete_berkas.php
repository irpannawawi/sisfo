<?php  require_once '../../lib/autoload.php';
use Lib\Database\Berkas;
$berkasObj = new Berkas;
$id = $_GET['id'];
$nip = $_GET['nip'];
$berkasLama = $berkasObj->getBerkasById($id)->fetch_object();
$tujuan = '../../assets/berkas/';
unlink($tujuan.$berkasLama->foto);
$res = $berkasObj->delete($id);
if($res){
	session_start();
	$_SESSION['updateSuccess'] = True;
	$_SESSION['tabOpen'] = 'dataLampiran';
	$target = BASE_URL."/pegawai/data_kepegawaian/detail.php?nip=$nip";
	header("Location: ".$target);
}else{
	$berkasObj->conn->error;
}
