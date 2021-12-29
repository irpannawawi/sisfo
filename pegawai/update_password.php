<?php require_once '../lib/autoload.php';
use Lib\Database\User;
session_start();
$old_password = $_POST['old_password'];
$new_password = $_POST['new_password'];
$confirm_new_password = $_POST['confirm_new_password'];

$userObj = new User;
$user = $userObj->getByid($_SESSION['user_id'])->fetch_object();
$isError = 1;
if (password_verify($old_password, $user->password)) {
$isError = 0;
}else{
	$_SESSION['error'] = true;
	$_SESSION['error'] = "Pasword lama anda salah";
}

if($new_password === $confirm_new_password AND $isError == 0){
	// do update
	$res = $userObj->updatePassword($user->username, $new_password);
}

header('Location:'.BASE_URL.'/pegawai/profile.php');
