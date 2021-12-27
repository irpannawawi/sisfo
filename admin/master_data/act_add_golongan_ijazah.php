<?php require_once '../../lib/autoload.php';
use Lib\Database\Master;

$golongan = $_POST['golongan'];
$keterangan = $_POST['keterangan'];
$golonganObj = new Master;
$res = $golonganObj->saveGolonganIjazah($golongan,$keterangan); 
if ($res) {
	header('Location: '.BASE_URL.'/admin/master_data/list_golongan_ijazah.php');
}else{
	print_r($golonganObj->conn->error);
}