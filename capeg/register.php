<?php require_once '../lib/autoload.php';
use Lib\Database\Capeg;
session_start();
$capegObj = new Capeg;
$tgl = explode('-', $_POST['tanggal_lahir']);
$data['username'] 			= $_POST['username'];
$data['nama'] 				= $_POST['nama_lengkap'];
$data['nik'] 				= $_POST['nik'];
$data['tempat_tgl_lahir'] 		= $_POST['tempat_lahir'].', '.$tgl[2].'-'.$tgl[1].'-'.$tgl[0];
$data['jenis_kelamin'] 		= $_POST['jenis_kelamin'];
$data['status_pernikahan'] 	= $_POST['status_pernikahan'];
$data['agama'] 				= $_POST['agama'];
$data['alamat'] 			= $_POST['alamat'];
$data['wa'] 				= $_POST['wa'];
$data['email'] 				= $_POST['email'];
$data['password'] 			= $_POST['password'];


$res = $capegObj->saveCapeg($data);
if ($res) {
	$_SESSION['regOk'] = True;
	header('location: '.BASE_URL.'/theme/loginsiemen/');
}else{
	echo $capegObj->conn->error;
}