<?php 
require_once '../../lib/autoload.php';
use Lib\Database\Gaji;
$gajiObj = new Gaji;


$tahun 			= $_POST['tahun'];
$bulan 			= $_POST['bulan'];
$tgl			= $tahun.'-'.$bulan.'-'.date('d');

$nip 			= $_POST['nip'];

$gaji_pokok1		= $_POST['gaji_pokok'];
$gaji_pokok			= str_replace(".", "", $gaji_pokok1);

$pot_pajak1			= $_POST['pot_pajak'];
$pot_pajak			= str_replace(".", "", $pot_pajak1);

$tunj_istri1		= $_POST['tunj_istri'];
$tunj_istri 		= str_replace(".", "", $tunj_istri1);

$tunj_anak1			= $_POST['tunj_anak'];
$tunj_anak			= str_replace(".", "", $tunj_anak1);

$pot_bpjs1 			= $_POST['pot_bpjs'];
$pot_bpjs			= str_replace(".", "", $pot_bpjs1);

$pot_iwp_21a		= $_POST['pot_iwp_21'];
$pot_iwp_21			= str_replace(".", "", $pot_iwp_21a);

$pot_iwp_81a		= $_POST['pot_iwp_81'];
$pot_iwp_81			= str_replace(".", "", $pot_iwp_81a);

$tunj_hselon1		= $_POST['tunj_hselon'];
$tunj_hselon		= str_replace(".", "", $tunj_hselon1);

$tunj_fung_umum1	= $_POST['tunj_fung_umum'];
$tunj_fung_umum		= str_replace(".", "", $tunj_fung_umum1);

$pot_tapebum1 		= $_POST['pot_tapebum'];
$pot_tapebum		= str_replace(".", "", $pot_tapebum1);

$tunj_fungsional1	= $_POST['tunj_fungsional'];
$tunj_fungsional	= str_replace(".", "", $tunj_fungsional1);

$pot_jkk1			= $_POST['pot_jkk'];
$pot_jkk			= str_replace(".", "", $pot_jkk1);

$tunj_kusus1 		= $_POST['tunj_kusus'];
$tunj_kusus			= str_replace(".", "", $tunj_kusus1);

$pot_jkm1			= $_POST['pot_jkm'];
$pot_jkm			= str_replace(".", "", $pot_jkm1);

$tunj_terpencil1	= $_POST['tunj_terpencil'];
$tunj_terpencil		= str_replace(".", "", $tunj_terpencil1);

$hutang1			= $_POST['hutang'];
$hutang				= str_replace(".", "", $hutang1);

$tkd1				= $_POST['tkd'];
$tkd				= str_replace(".", "", $tkd1);

$bulog1 			= $_POST['bulog'];
$bulog			    = str_replace(".", "", $bulog1);

$tunj_beras1		= $_POST['tunj_beras'];
$tunj_beras			= str_replace(".", "", $tunj_beras1);

$sewa1				= $_POST['sewa'];
$sewa				= str_replace(".", "", $sewa1);

$tunj_pajak1		= $_POST['tunj_pajak'];
$tunj_pajak			= str_replace(".", "", $tunj_pajak1);

$tunj_bpjs1			= $_POST['tunj_bpjs'];
$tunj_bpjs			= str_replace(".", "", $tunj_bpjs1);

$tunj_jkk1			= $_POST['tunj_jkk'];
$tunj_jkk			= str_replace(".", "", $tunj_jkk1);

$tunj_jkm1 			= $_POST['tunj_jkm'];
$tunj_jkm			= str_replace(".", "", $tunj_jkm1);

$pembulatan1 		= $_POST['pembulatan'];
$pembulatan			= str_replace(".", "", $pembulatan1);

$jml_kotor1 		= $_POST['jml_kotor'];
$jml_kotor			= str_replace(".", "", $jml_kotor1);

$potongan1 			= $_POST['potongan'];
$potongan			= str_replace(".", "", $potongan1);

$gaji_bersih1		= $_POST['jml_bersih'];
$gaji_bersih		= str_replace(".", "", $gaji_bersih1);

if ($bulan=="01") {
	$bln = "Januari";
}
elseif ($bulan=="02") {
	$bln = "Februari";
}
elseif ($bulan=="03") {
	$bln = "Maret";
}
elseif ($bulan=="04") {
	$bln = "April";
}
elseif ($bulan=="05") {
	$bln = "Mei";
}
elseif ($bulan=="06") {
	$bln = "Juni";
}
elseif ($bulan=="07") {
	$bln = "Juli";
}
elseif ($bulan=="08") {
	$bln = "Agustus";
}
elseif ($bulan=="09") {
	$bln = "September";
}
elseif ($bulan=="10") {
	$bln = "Oktober";
}
elseif ($bulan=="11") {
	$bln = "November";
}
elseif ($bulan=="12") {
	$bln = "Desember";
}

$gaji = $gajiObj->getGajiBulanan($nip,$bulan,$tahun);
if($gaji->num_rows>0){
	session_start();
	$_SESSION['insertFailed']=true;
	header('Location: '.BASE_URL.'/admin/penggajian');die;
}else{
	$res = $gajiObj->insert($nip,$gaji_pokok,$tunj_istri,$tunj_anak,$tunj_hselon,$tunj_fung_umum,$tunj_fungsional,$tunj_kusus,$tunj_terpencil,$tkd,$tunj_beras,$tunj_pajak,$tunj_bpjs,$tunj_jkk,$tunj_jkm,$pembulatan,$pot_pajak,$pot_bpjs,$pot_iwp_21,$pot_iwp_81,$pot_tapebum,$pot_jkk,$pot_jkm,$hutang,$bulog,$sewa,$tgl,$gaji_bersih);
	if($res){
		session_start();
	$_SESSION['insertSuccess']=true;
	header('Location: '.BASE_URL.'/admin/penggajian');die;
	print_r($res);
	}else{
		echo $gajiObj->conn->error;
	}
}