<?php require_once '../../lib/autoload.php';
session_start();
use Lib\Database\Cuti;
$cutiObj 	= new Cuti;
$nip 		= $_SESSION['nip'];
$id 		= $_GET['id'];

$res = $cutiObj->delete($id, $nip);
if ($res) {	
	header("Location: ".BASE_URL."/pegawai/absensi/list_cuti.php");
}else{
	echo $cutiObj->conn->error;
}

