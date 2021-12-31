<?php require_once '../../lib/autoload.php';
use Lib\Database\Keluarga;
$keluargaObj 	= new Keluarga;
$nip 			= $_POST['nip'];
$id 			= $_POST['id'];
$nama			= $_POST['nama'];
$tempat_lahir 	= $_POST['tempat'];
$tahun			= $_POST['tahun'];
$bulan 			= $_POST['bulan'];
$hari 			= $_POST['hari'];
$tgl_lahir  	= $tahun."-".$bulan."-".$hari;
$pekerjaan 		= $_POST['pekerjaan'];
$tgl_perkawinan = $_POST['tgl_perkawinan'];
$ke				= $_POST['ke'];
$nik 		    = $_POST['nik'];
$penghasilan	= $_POST['penghasilan'];
$res = $keluargaObj->updateKeluarga($id,$nama,$tempat_lahir,$tgl_lahir,$nik,$pekerjaan,$tgl_perkawinan,$ke,$penghasilan);
if($res){
	session_start();
	$_SESSION['updateSuccess'] = True;
	$_SESSION['tabOpen'] = 'dataSuamiIstri';
	$target = BASE_URL."/pegawai/data_kepegawaian/detail.php?nip=$nip";
	header("Location: ".$target);
}
