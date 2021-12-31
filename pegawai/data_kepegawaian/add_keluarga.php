<?php require_once '../../lib/autoload.php';
use Lib\Database\Keluarga;
$pegawaiObj = new Keluarga;


$nip 			= $_POST['nip'];
$nama			= $_POST['nama'];
$tempat_lahir 	= $_POST['tempat'];
$tahun			= $_POST['tahun'];
$bulan 			= $_POST['bulan'];
$hari 			= $_POST['hari'];
$tgl_lahir  	= $tahun."-".$bulan."-".$hari;
$pekerjaan 		= $_POST['pekerjaan'];
$ke				= $_POST['ke'];
$nik 		    = $_POST['nik'];
$penghasilan	= $_POST['penghasilan'];
$tgl_kawin = explode('-',$_POST['tgl_perkawinan']);
$tgl_kawin = array_reverse($tgl_kawin);
$tgl_kawin = implode('-', $tgl_kawin);
$tgl_perkawinan = $tgl_kawin;
$res = $pegawaiObj->insertKeluarga($nip,$nama,$tempat_lahir,$tgl_lahir,$nik,$pekerjaan,$tgl_perkawinan,$ke,$penghasilan);
$id = $_POST['id_pegawai'];
if($res){
	session_start();
	$_SESSION['insertSuccess']=true;
	$_SESSION['tabOpen'] = 'dataSuamiIstri';
	header("Location: ".BASE_URL."/pegawai/data_kepegawaian/detail.php?nip=$nip");
}else{
	echo $pegawaiObj->conn->error;
}