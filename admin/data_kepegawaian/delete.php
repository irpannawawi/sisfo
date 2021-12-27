<?php  require_once '../../lib/autoload.php';
use Lib\Database\Keluarga;
$pegawaiObj = new Keluarga;
$id = $_GET['id'];
$res = $pegawaiObj->deleteKeluarga($id);
if ($res){
	echo json_encode(['status'=>'ok']);
}else{
	echo json_encode(['status'=>'false']);
}