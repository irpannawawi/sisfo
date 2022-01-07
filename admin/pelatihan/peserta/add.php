<?php require_once '../../../lib/autoload.php';
use Lib\Database\Pelatihan;
$pelatihanObj = new Pelatihan;

$id = $_POST['id_pelatihan'];
$tgl = $_POST['tanggal'];
foreach($_POST['peserta'] as $nip){
	$res = $pelatihanObj->savePeserta($nip, $id, $tgl);
	if (!$res) {
		$status =0;
		break;
	}else{
		$status = 1;
	}
}
if ($status) {
	header('Location: '.BASE_URL.'/admin/pelatihan/peserta');
}else{
	print_r($pelatihanObj->conn->error);
}