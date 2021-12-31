<?php require_once '../lib/autoload.php';
use Lib\Database\Capeg;
session_start();
$old_password = $_POST['old_password'];
$new_password = $_POST['new_password'];
$confirm_new_password = $_POST['confirm_new_password'];

$userObj = new Capeg;
$user = $userObj->getByid($_SESSION['user_id'])->fetch_object();

$isError = 1;
if (password_verify($old_password, $user->password)) {
	if($new_password === $confirm_new_password){
		// do update
		$res = $userObj->updatePassword($user->username, password_hash($new_password, PASSWORD_DEFAULT));
		if ($res) {
			$_SESSION['updateSuccess'] = True;
			$_SESSION['successMessage'] = "password berhasil dirubah";
		}
	}else{
		$isError =1;
		$_SESSION['error'] = true;
		$_SESSION['errorMessage'] = "Pasword baru tidak cocok";
	}
}else{
	$_SESSION['error'] = true;
	$_SESSION['errorMessage'] = "Pasword lama anda salah";
}
header('Location:'.BASE_URL.'/capeg/dashboard.php');
