<?php require_once '../../lib/autoload.php';
use Lib\Database\Master;

$status = $_POST['status'];
$id = $_POST['id'];
$pangkatObj = new Master;
$res = $pangkatObj->saveStatus($status,$id); 
if ($res) {
	header('Location: '.BASE_URL.'/admin/master_data/list_status_kepegawaian.php');
}else{
	print_r($pangkatObj->errors);
}