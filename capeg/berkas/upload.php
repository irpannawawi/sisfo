<?php  require_once '../../lib/autoload.php'; session_start();
use Lib\Database\Capeg;
use Lib\Database\Berkascapeg;
$pegawaiObj = new Capeg;

				// MENAMPUNG DATA YANG DIINPUTKAN
$jenis 			= $_POST['jenis'];
$keterangan		= $_POST['keterangan'];
$id = $_SESSION['user_id'];
// move file 
$tujuan = '../../assets/berkas_capeg/';
$nama_berkas = $id.'_'.$_FILES['berkas']['name'];
$target_file = $tujuan.basename($nama_berkas);
$uploadOk = 1;
if (file_exists($target_file)) {
	$errMsg = "Sorry, file already exists.";
	$uploadOk = 0;
}
// Check file size
if ($_FILES["berkas"]["size"] > 5000000) {
	$errMsg = "Sorry, your file is too large.";
	$uploadOk = 0;
}

if ($uploadOk == 1) {
	move_uploaded_file($_FILES["berkas"]["tmp_name"], $target_file);
	$fileUpladed = true;
}else{
	session_start();
	$_SESSION['errorUpload']=true;
	$_SESSION['errorMessage'] = $errMsg;
	$_SESSION['tabOpen'] = 'dataLampiran';
	header('Location: '.BASE_URL."/admin/data_kepegawaian/detail.php?id=$id_pegawai");
}

// insert to db
if($fileUpladed == true){
	$berkasObj = new Berkascapeg;
	$res = $berkasObj->insert($id, $jenis, $keterangan, $nama_berkas);
	if($res){
		session_start();
	$_SESSION['insertSuccess']=true;
	header('Location: '.BASE_URL."/capeg/berkas");
	}
}
