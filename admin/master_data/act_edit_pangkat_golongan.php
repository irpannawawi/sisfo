<?php require_once '../../lib/autoload.php';
use Lib\Database\Master;

$pangkat = $_POST['pangkat'];
$id = $_POST['id'];
$pangkatObj = new Master;
$res = $pangkatObj->savePangkat($pangkat,$id); 
if ($res) {
	header('Location: '.BASE_URL.'/admin/master_data/list_pangkat_golongan.php');
}else{
	print_r($pangkatObj->errors);
}