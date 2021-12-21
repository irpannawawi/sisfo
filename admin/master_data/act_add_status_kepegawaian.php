<?php require_once '../../lib/autoload.php';
use Lib\Database\Master;

$status = $_POST['status'];
$statusObj = new Master;
$res = $statusObj->saveStatus($status); 
if ($res) {
	header('Location: '.BASE_URL.'/admin/master_data/list_status_kepegawaian.php');
}else{
	print_r($statusObj->errors);
}