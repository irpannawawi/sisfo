<?php require_once '../../lib/autoload.php';
session_start();
use Lib\Database\Resign;
$resignObj 	= new Resign;

$nip = $_SESSION['nip'];
$res = $resignObj->save($nip);
if ($res) {
	header("Location: ".BASE_URL."/pegawai/resign");
}else{
	echo $resignObj->conn->error;
}

