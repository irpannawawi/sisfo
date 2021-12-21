<?php require_once '../../lib/autoload.php';
use Lib\Database\Master;

$golongan = $_POST['golongan'];
$keterangan = $_POST['keterangan'];
$id = $_POST['id'];
$golonganIjazahObj = new Master;
$res = $golonganIjazahObj->saveGolonganIjazah($golongan,$keterangan,$id); 
if ($res) {
	header('Location: '.BASE_URL.'/admin/master_data/list_golongan_ijazah.php');
}else{
	print_r($golonganIjazahObj->errors);
}