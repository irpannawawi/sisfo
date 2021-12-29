<?php 
require_once '../lib/autoload.php';
use Lib\Database\User;
session_start();
$username = $_POST['username'];
$password = $_POST['password'];
// check not empty
if (empty($username) OR empty($password)) {
	$error = true;
$_SESSION['error'] = true;
$_SESSION['errorMessage'] = "user tidak ditemukan";

}else{

	$userObj = new User();
	$user = $userObj->getByUsername($username);
	if($user->num_rows >= 1){
		// user found
		$userData = $user->fetch_object();
		if(password_verify($password, $userData->password) AND $userData->status == 'Aktif'){
			// password verified
			$_SESSION['username'] = $userData->username;
			$_SESSION['nama'] = $userData->nama;
			$_SESSION['nip'] = $userData->nip;
			$_SESSION['user_id'] = $userData->id;
			$_SESSION['level'] = $userData->level;
			$_SESSION['foto'] = $userData->foto;
			if($_SESSION['level'] == 'User'){
				header('location: ../pegawai/profile.php');die;
			}else{
				$_SESSION['error'] = true;
				$_SESSION['errorMessage'] = "Level bukan user";
			}
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