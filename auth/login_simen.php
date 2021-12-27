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
header('location: ../theme/loginsiemen');
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
			$_SESSION['level'] = $userData->level;
			$_SESSION['foto'] = $userData->foto;
			if($_SESSION['level'] == 'User'){
				header('location: ../pegawai/profile.php');
			}else{
				$_SESSION['error'] = true;
				echo $_SESSION['errorMessage'] = "Level bukan user";
				// header('location: ../theme/loginsiemen');
			}
			die;
		}else{
			$error = true;
			$_SESSION['error'] = true;
			echo $_SESSION['errorMessage'] = "password salah";
			// header('location: ../theme/loginsiemen');
		}
	}else{
		$error = true;
			$_SESSION['error'] = true;
			echo $_SESSION['errorMessage'] = "user tidak ditemukan";
			// header('location: ../theme/loginsiemen');
	}

}