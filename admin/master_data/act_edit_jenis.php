<?php require_once '../../lib/autoload.php';
use Lib\Database\Master;

$jenis = $_POST['jenis'];
$id = $_POST['id'];
$pangkatObj = new Master;
$res = $pangkatObj->saveJenis($jenis,$id); 
if ($res) {
	header('Location: '.BASE_URL.'/admin/master_data/list_jenis.php');
}else{
	print_r($pangkatObj->errors);
}