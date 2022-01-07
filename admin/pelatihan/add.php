<?php require_once '../../lib/autoload.php';
use Lib\Database\Pelatihan;

$pelatihan = $_POST['nama'];
if(!empty($_POST['id'])){
	$id = $_POST['id'];
}else{
	$id = null;
}
$pelatihanObj = new Pelatihan;
$res = $pelatihanObj->savePelatihan($pelatihan, $id); 
if ($res) {
	header('Location: '.BASE_URL.'/admin/pelatihan');
}else{
	print_r($pelatihanObj->conn->error);
}