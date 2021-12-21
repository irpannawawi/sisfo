<?php require_once '../../lib/autoload.php';
use Lib\Database\Master;

$keterangan = $_POST['keterangan'];
$id = $_POST['id'];
$skObj = new Master;
$res = $skObj->saveSk($keterangan,$id); 
if ($res) {
	header('Location: '.BASE_URL.'/admin/master_data/list_sk.php');
}else{
	print_r($skObj->conn->error);
}