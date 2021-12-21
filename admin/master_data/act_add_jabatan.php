<?php require_once '../../lib/autoload.php';
use Lib\Database\Master;

$jabatan = $_POST['jabatan'];
$pangkatObj = new Master;
$res = $pangkatObj->saveJabatan($jabatan); 
if ($res) {
	header('Location: '.BASE_URL.'/admin/master_data/list_jabatan.php');
}else{
	print_r($pangkatObj->errors);
}