<?php require_once '../../lib/autoload.php';
use Lib\Database\Profil;
session_start();
$profilObj = new Profil;

if (isset($_POST['id'])) {
	$id 		= $_POST['id'];
}else{
	$id = null;
}
$nama 		= $_POST['nama'];
$instansi 	= $_POST['instansi'];
$provinsi 	= $_POST['provinsi'];
$kota 		= $_POST['kota'];
$alamat 	= $_POST['alamat'];
$fb 		= $_POST['fb'];
$twitter 	= $_POST['twitter'];
$ig 		= $_POST['ig'];

if(!empty($_FILES['foto']) AND $_FILES['foto']['error']==0){
	// hapus foto lama

		unlink('../../assets/logo.jpg');
	// move file 
	$tujuan = '../../assets/';
	$nama_berkas = 'logo.jpg';
	$target_file = $tujuan.basename($nama_berkas);
	$uploadOk = 1;
	move_uploaded_file($_FILES["foto"]["tmp_name"], $target_file);
}

$res = $profilObj->save($nama, $instansi, $provinsi, $kota, $alamat, 'logo.jpg', $bg, $fb, $twitter, $ig, $id);
if($res){
	header('location: '.BASE_URL.'/admin/pengaturan');
}else{
	echo $profilObj->conn->error;
}
