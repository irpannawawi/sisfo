<?php require_once '../../lib/autoload.php';
session_start();
use Lib\Database\Cuti;
$cutiObj 	= new Cuti;
$nip 				= $_SESSION['nip'];
$jenis_cuti 		= $_POST['jenis'];
$alasan 			= $_POST['alasan'];
$tgl_cuti 			= $_POST['tanggal'];
$tanggal 			= explode('-', $tgl_cuti);
$tgl_mulai_arr 		= explode('/',$tanggal[0]);
$tgl_selesai_arr 	= explode('/',$tanggal[1]);
$tgl_mulai 			= implode('-', [trim($tgl_mulai_arr[2]), trim($tgl_mulai_arr[0]), trim($tgl_mulai_arr[1])]); 
$tgl_selesai 		= implode('-', [trim($tgl_selesai_arr[2]), trim($tgl_selesai_arr[0]), trim($tgl_selesai_arr[1])]); 

$res = $cutiObj->save($nip, $jenis_cuti, $alasan, $tgl_mulai, $tgl_selesai);
if ($res) {
	
	header("Location: ".BASE_URL."/pegawai/absensi/list_cuti.php");
}else{
	echo $cutiObj->conn->error;
}

