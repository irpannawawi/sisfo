<?php require_once '../../lib/autoload.php';
use Lib\Database\Pelatihan;

$id = $_GET['id'];

$pelatihanObj = new Pelatihan;
$res = $pelatihanObj->deletePelatihan($id); 
if ($res) {
	header('Location: '.BASE_URL.'/admin/pelatihan');
}else{
	print_r($pelatihanObj->conn->error);
}