<?php  require_once '../../lib/autoload.php';
use Lib\Database\Pegawai;
$pegawaiObj = new Pegawai;

// DARI VIEW
				// MENAMPUNG DATA YANG DIINPUTKAN
				$id 			= $_POST['id'];
				$nip 			= $_POST['nip'];
				$nama			= $_POST['nama'];
				$tempat_lahir 	= $_POST['tempat'];
				$tahun			= $_POST['tahun'];
				$bulan 			= $_POST['bulan'];
				$hari 			= $_POST['hari'];
				$tgl_lahir  	= $tahun."-".$bulan."-".$hari;
				$gender			= $_POST['gender'];
				$agama 			= $_POST['agama_pegawai'];
				$kebangsaan 	= $_POST['kebangsaan'];
				$jumlah_keluarga= $_POST['jml_keluarga'];
				$alamat 		= $_POST['alamat'];
				$sk_terakhir 	= $_POST['sk_terakhir'];
				$pangkat 		= $_POST['pangkat'];
				$tmt_golongan	= $_POST['tmt_golongan'];
				$tmt_golongan 	= explode('-',$tmt_golongan);
				$tmt_golongan	= array_reverse($tmt_golongan);
				$tmt_golongan	= implode('-',$tmt_golongan);
				$jenis 			= $_POST['jenis_pegawai'];
				$tmt_capeg 		= $_POST['tmt_capeg'];
				$tmt_capeg 	= explode('-',$tmt_capeg);
				$tmt_capeg	= array_reverse($tmt_capeg);
				$tmt_capeg	= implode('-',$tmt_capeg);
				$status 		= $_POST['status_pegawai'];
				$jabatan		= $_POST['jabatan'];
				$digaji 		= $_POST['gaji'];

				$gaji_pokok1 	= $_POST['gaji_pokok'];
				$gaji_pokok 	= str_replace(".", "", $gaji_pokok1);

				$penghasilan1 	= $_POST['penghasilan'];
				$penghasilan 	= str_replace(".", "", $penghasilan1);


				$masa_golongan 	= $_POST['masa_golongan'];
				$masa_keseluruhan= $_POST['masa_keseluruhan'];
				$npwp 			= $_POST['npwp'];
				$rt 			= $_POST['rt'];
				$rw 			= $_POST['rw'];
				$desa 			= $_POST['desa'];
				$kecamatan 		= $_POST['kecamatan'];
				$kabupaten 		= $_POST['kabupaten'];
				$wa             = $_POST['wa'];

				// DARI MODEL
				// MENGARAH KE METHOD DI CLASS MODEL PENDUDUK
				$res			= $pegawaiObj->update($id,$nip,$nama,$tempat_lahir,$tgl_lahir,$gender,$agama,$kebangsaan,$jumlah_keluarga,$alamat,$sk_terakhir,$pangkat,$tmt_golongan,$jenis,$tmt_capeg,$status,$jabatan,$digaji,$gaji_pokok,$penghasilan,$masa_golongan,$masa_keseluruhan,$npwp,$rt,$rw,$desa,$kecamatan,$kabupaten,$wa);
				
if($res){
	session_start();
	$_SESSION['updateSuccess']=true;
	header("Location: ".BASE_URL."/admin/data_kepegawaian/detail.php?id=$id");
}