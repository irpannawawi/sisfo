<?php require_once '../../lib/autoload.php';
use Lib\Database\User;
$id = $_POST['id'];
$userObj = new User;
$res = $userObj->deleteUser($id); 

if($res){
	echo json_encode(['status'=>'ok']);
}else{
	echo json_encode(['status'=>$userObj->conn->error]);
}
