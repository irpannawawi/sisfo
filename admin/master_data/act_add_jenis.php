<?php require_once '../../lib/autoload.php';
use Lib\Database\Master;

$jabatan = $_POST['jabatan'];
$pangkatObj = new Master;
$res = $pangkatObj->saveJenis($jabatan); 
if ($res) {
	header('Location: '.BASE_URL.'/admin/master_data/list_jenis.php');
}else{
	print_r($pangkatObj->errors);
}