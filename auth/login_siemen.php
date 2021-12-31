<?php 
require_once '../lib/autoload.php';
use Lib\Database\Capeg;
session_start();
$username = $_POST['username'];
$password = $_POST['password'];
// check not empty
if (empty($username) OR empty($password)) {
	$error = true;
$_SESSION['error'] = true;
$_SESSION['errorMessage'] = "user tidak ditemukan";

}else{

	$userObj = new Capeg();
	$user = $userObj->getByUsername($username);
	if($user->num_rows >= 1){
		// user found
		$userData = $user->fetch_object();
		if(password_verify($password, $userData->password)){
			// password verified
			$_SESSION['username'] = $userData->username;
			$_SESSION['nama'] = $userData->nama;
			$_SESSION['user_id'] = $userData->id;
			$_SESSION['foto'] = $userData->foto;
				header('location: ../capeg/dashboard.php');die;
			
		}else{
			$error = true;
			$_SESSION['error'] = true;
			$_SESSION['errorMessage'] = "password salah";
			// header('location: ../theme/loginsiemen');
		}
	}else{
		$error = true;
			$_SESSION['error'] = true;
			$_SESSION['errorMessage'] = "user tidak ditemukan";
			// header('location: ../theme/loginsiemen');
	}

}

				header('location: ../theme/loginsiemen');