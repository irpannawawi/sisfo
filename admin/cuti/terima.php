<?php require_once '../../lib/autoload.php';
session_start();
use Lib\Database\Cuti;
$cutiObj = new Cuti;
$id = $_GET['id'];
$res = $cutiObj->terimaCuti($id);
if($res){
	header('location: '.BASE_URL.'/admin/cuti');
}else{
	echo $cutiObj->conn->error;
}