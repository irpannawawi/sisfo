<?php require_once '../../lib/autoload.php';
use Lib\Database\User;

$data['username'] 		= $_POST['username'];
$data['nip'] 			= $_POST['nip'];
$data['password'] 		= $_POST['password'];
$data['namaLengkap'] 	= $_POST['namaLengkap'];
$data['jenisKelamin'] 	= $_POST['jenisKelamin'];
$data['level'] 			= $_POST['level'];



$userObj = new User;
$res = $userObj->saveUser($data); 

if($res){
	echo json_encode(['status'=>'ok']);
}else{
	echo json_encode(['status'=>$userObj->conn->error]);
}
