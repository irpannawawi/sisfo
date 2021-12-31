<?php require_once '../lib/autoload.php';
use Lib\Database\User;

$username = addslashes($_POST['username']);
$password = addslashes($_POST['password']);

$error = false;
// check not empty
if (empty($username) OR empty($password)) {
	$error = true;
}else{

	$userObj = new User();
	$user = $userObj->getByUsername($username);
	if($user->num_rows >= 1){
		// user found
		$userData = $user->fetch_object();
		if(password_verify($password, $userData->password) AND $userData->status == 'Aktif'){
			// password verified
			session_start();
			$_SESSION['username'] = $userData->username;
			$_SESSION['nama'] = $userData->nama;
			$_SESSION['nip'] = $userData->nip;
			$_SESSION['user_id'] = $userData->id;
			$_SESSION['level'] = $userData->level;
			$_SESSION['foto'] = $userData->foto;
			if($_SESSION['level'] == 'Admin' OR $_SESSION['level'] == 'Bendahara' ){
				header('location: ../admin/dashboard.php');
			}else{
				print_r($_SESSION['level']);
			}
			die;
		}else{
			$error = true;
		}
	}else{
		$error = true;
	}

}

header('location: ../admin/?error=1');