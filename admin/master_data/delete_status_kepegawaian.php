<?php require_once '../../lib/autoload.php';
use Lib\Database\Master;


$id = $_GET['id'];
$pangkatObj = new Master;
$res = $pangkatObj->delete($id); 
if ($res) {
	header('Location: '.BASE_URL.'/admin/master_data/list_status_kepegawaian.php');
}else{
	print_r($pangkatObj->conn->error);
}