<?php require_once '../../lib/autoload.php';
use Lib\Database\User;

$userObj = new User;
$id = $_GET['id'];
$res = $userObj->switcStatus($id);
if ($res) {
	header('Location:'.BASE_URL.'/admin/data_pengguna/list_data_pengguna.php');
}else{
	print_r($userObj->conn->error);
}