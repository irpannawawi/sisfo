<?php require_once '../../lib/autoload.php';
use Lib\Database\Master;


$id = $_GET['id'];
$golonganIjazahObj = new Master;
$res = $golonganIjazahObj->deleteGolonganIjazah($id); 
if ($res) {
	header('Location: '.BASE_URL.'/admin/master_data/list_golongan_ijazah.php');
}else{
	print_r($golonganIjazahObj->conn->error);
}