<?php require_once '../lib/autoload.php';
use Lib\Database\User;
session_start();
$userObj = new User;
$id = $_POST['id'];
$username = $_POST['username'];
$nama = $_POST['nama'];
$user = $userObj->getByid($id)->fetch_object();
if(!empty($_FILES['foto']) AND $_FILES['foto']['error']==0){
	// hapus foto lama
	// get user 
	$foto_lama = $user->foto;
	if($foto_lama != 'avatar.jpg'){
		unlink('../assets/avatar/'.$foto_lama);
	}

	// move file 
	$tujuan = '../assets/avatar/';
	$nama_berkas = $user->nip.'_'.$_FILES['foto']['name'];
	$target_file = $tujuan.basename($nama_berkas);
	$uploadOk = 1;
	move_uploaded_file($_FILES["foto"]["tmp_name"], $target_file);
	// update foto
	$userObj->updateFoto($id, $nama_berkas);
}

// update username and full name
$res = $userObj->updateUser($id, $username, $nama);
if($res){
	$_SESSION['updateSuccess'] = True;
	$_SESSION['successMessage'] = "Perubahan telah disimpan";
	$userData = $userObj->getByid($id)->fetch_object();
	$_SESSION['username'] = $userData->username;
	$_SESSION['nama'] = $userData->nama;
	$_SESSION['foto'] = $userData->foto;
}else{
	$_SESSION['error'] = true;
		$_SESSION['errorMessage'] = "Pasword baru tidak cocok";
		echo $userObj->conn->error;die;
}

header('Location:'.BASE_URL.'/pegawai/profile.php');
