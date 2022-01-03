<?php require_once '../../lib/autoload.php';
use Lib\Database\Capeg;
$capegObj = new Capeg;
$id = $_GET['id'];
$res = $capegObj->tolakCapeg($id);
if($res){
	header('location: '.BASE_URL.'/admin/capeg');
}else{
	echo $capegObj->conn->error;
}