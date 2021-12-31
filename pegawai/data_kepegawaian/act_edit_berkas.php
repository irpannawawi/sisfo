<?php  require_once '../../lib/autoload.php';
use Lib\Database\Pegawai;
use Lib\Database\Berkas;
$pegawaiObj = new Pegawai;
$berkasObj = new Berkas;

				// MENAMPUNG DATA YANG DIINPUTKAN
$id 			= $_POST['id'];
$nip 			= $_POST['nip'];
$keterangan		= $_POST['keterangan'];
$tgl 			= date('Y-m-d');
$id_pegawai		= $_POST['id_pegawai'];

$berkasLama = $berkasObj->getBerkasById($id)->fetch_object();
// move file 
$tujuan = '../../assets/berkas/';
$nama_berkas = $nip.'_'.$_FILES['berkas']['name'];
$target_file = $tujuan.basename($nama_berkas);
$uploadOk = 1;

unlink($tujuan.$berkasLama->foto);

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
	header("Location: ".BASE_URL."/pegawai/data_kepegawaian/detail.php?nip=$nip");
}

// insert to db
if($fileUpladed == true){
	$res = $berkasObj->update($id, $keterangan, $tgl,$nama_berkas);
	if($res){
		session_start();
	$_SESSION['insertSuccess']=true;
	$_SESSION['tabOpen'] = 'dataLampiran';
	header("Location: ".BASE_URL."/pegawai/data_kepegawaian/detail.php?nip=$nip");
	}
}
