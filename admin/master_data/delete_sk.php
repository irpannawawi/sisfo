<?php require_once '../../lib/autoload.php';
use Lib\Database\Master;


$id = $_GET['id'];
$skObj = new Master;
$res = $skObj->deleteSk($id); 
if ($res) {
	header('Location: '.BASE_URL.'/admin/master_data/list_sk.php');
}else{
	print_r($skObj->conn->error);
}