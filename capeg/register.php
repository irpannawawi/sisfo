<?php require_once '../lib/autoload.php';
use Lib\Database\Capeg;
session_start();
$capegObj = new Capeg;

$nama = $_POST['nama'];
$username = $_POST['username'];
$wa = $_POST['wa'];
$password = $_POST['password'];

$data = [
	'nama'=>$nama,
	'username'=>$username,
	'password'=>$password,
	'wa'=>$wa
];
$res = $capegObj->saveCapeg($data);
if ($res) {
	$_SESSION['regOk'] = True;
	header('location: '.BASE_URL.'/theme/loginsiemen/');
}else{
	echo $capegObj->conn->error;
}