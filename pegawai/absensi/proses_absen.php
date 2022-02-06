<?php require_once '../../lib/autoload.php';
session_start();
use Lib\Database\Absensi;
$absensiObj 	= new Absensi;
$nip = $_SESSION['nip'];
$jam = date('h:i:s');
$tgl = date('Y-m-d');
if (isset($_POST['submit'])) {
	$img = $_POST['foto']; 

    $folderPath = "../../assets/absensi/"; 
	$image_parts = explode(";base64,", $img); 

    $image_type_aux = explode("image/", $image_parts[0]); 

    $image_type = $image_type_aux[1]; 

   

    $image_base64 = base64_decode($image_parts[1]); 

    $fileName = $nip.'_'.uniqid(). '.png'; 

   

    $file = $folderPath . $fileName; 

    file_put_contents($file, $image_base64); 
}

$absen_today = $absensiObj->getByNip($nip, $tgl);
if($absen_today->num_rows >0){
	$absn = $absen_today->fetch_object();
	// cek absen kedua
	if($absn->jam_keluar == ''){
		// do absen kedua
		$res = $absensiObj->absenKeluar($nip, $fileName);
	}
}else{
	// absen pertama
	$keterangan = $_POST['keterangan'];
	$tugas = $_POST['tugas'];
	$res = $absensiObj->absenMasuk($nip, $fileName, $keterangan, $tugas);
}
if ($res) {
	// code...
header("Location: ".BASE_URL."/pegawai/absensi");
}else{
	echo $absensiObj->conn->error;
}