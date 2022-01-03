<?php require_once '../../lib/autoload.php';
session_start();
use Lib\Database\Resign;
$resignObj = new Resign;
$id = $_GET['id'];
$res = $resignObj->tolakResign($id);
if($res){
	header('location: '.BASE_URL.'/admin/resign');
}else{
	echo $resignObj->conn->error;
}