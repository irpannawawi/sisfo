<?php require_once '../../lib/autoload.php';
use Lib\Database\User;

$data['username'] 		= $_POST['inputUsername'];
$data['nip'] 			= $_POST['inputNip'];
$data['password'] 		= $_POST['inputPassword'];
$data['namaLengkap'] 	= $_POST['inputNamaLengkap'];
$data['jenisKelamin'] 	= $_POST['jk'];
$data['level'] 			= $_POST['inputLevel'];
$id = $_POST['id'];

$userObj = new User;
$res = $userObj->saveUser($data,$id); 

if($res){
	echo json_encode(['status'=>'ok']);
	session_start();
	$_SESSION['editSuccess'] = true;
	header('Location: '.BASE_URL.'/admin/data_pengguna/list_data_pengguna.php');
}else{
	echo json_encode(['status'=>$userObj->conn->error]);
}
