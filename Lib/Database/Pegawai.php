<?php namespace Lib\Database;
require_once 'Db.php';
class Pegawai extends Db{
	public function __construct(){
		parent::__construct();
	}

	public function getPegawai(){
		$sql = "SELECT * FROM pegawai";
		return $this->conn->query($sql);
	}

	public function getByNip($nip)
	{
		$sql = "SELECT * FROM pegawai WHERE nip='$nip'";
		return $this->conn->query($sql);
	}

	public function getKepalaDinas(){
		$sql = "SELECT * from pegawai WHERE jabatan='KEPALA DINAS'";
		return $this->conn->query($sql);
	}

	public function insert($nip,$nama,$tempat_lahir,$tgl_lahir,$gender,$agama,$kebangsaan,$jumlah_keluarga,$alamat,$sk_terakhir,$pangkat,$tmt_golongan,$jenis,$tmt_capeg,$status,$jabatan,$digaji,$gaji_pokok,$masa_golongan,$masa_keseluruhan,$npwp,$rt,$rw,$desa,$kecamatan,$kabupaten,$wa){
		$query		= "INSERT INTO pegawai(nip, nama, tempat_lahir, tgl_lahir, gender, agama, kebangsaan, jumlah_keluarga, alamat, sk_terakhir, pangkat, tmt_golongan, jenis_pegawai, tmt_capeg, status_pegawai, jabatan, digaji_menurut, gaji_pokok, besarnya_penghasilan, masa_kerja_golongan, masa_kerja_keseluruhan, npwp, rt, rw, desa, kecamatan, kabupaten, wa) VALUES
							   ('$nip','$nama','$tempat_lahir','$tgl_lahir','$gender','$agama','$kebangsaan','$jumlah_keluarga','$alamat','$sk_terakhir','$pangkat','$tmt_golongan','$jenis','$tmt_capeg','$status','$jabatan','$digaji','$gaji_pokok','0','$masa_golongan','$masa_keseluruhan','$npwp','$rt','$rw','$desa','$kecamatan','$kabupaten','$wa')";
		return $this->conn->query($query);
	}

	public function update($id,$nip,$nama,$tempat_lahir,$tgl_lahir,$gender,$agama,$kebangsaan,$jumlah_keluarga,$alamat,$sk_terakhir,$pangkat,$tmt_golongan,$jenis,$tmt_capeg,$status,$jabatan,$digaji,$gaji_pokok,$penghasilan,$masa_golongan,$masa_keseluruhan,$npwp,$rt,$rw,$desa,$kecamatan,$kabupaten,$wa){
		$query		= "UPDATE pegawai SET
								nip 						= '$nip',
								nama						= '$nama',
								tempat_lahir 				= '$tempat_lahir',
								tgl_lahir 					= '$tgl_lahir',
								gender 						= '$gender',
								agama 						= '$agama',
								kebangsaan 					= '$kebangsaan',
								jumlah_keluarga				= '$jumlah_keluarga',
								alamat						= '$alamat',
								sk_terakhir 				= '$sk_terakhir',
								pangkat 					= '$pangkat',
								tmt_golongan				= '$tmt_golongan',
								jenis_pegawai 				= '$jenis',
								tmt_capeg 					= '$tmt_capeg',
								status_pegawai 				= '$status',
								jabatan 					= '$jabatan',
								digaji_menurut				= '$digaji',
								gaji_pokok					= '$gaji_pokok',
								besarnya_penghasilan 		= '$penghasilan',
								masa_kerja_golongan		= '$masa_golongan',
								masa_kerja_keseluruhan 	= '$masa_keseluruhan',
								npwp 						= '$npwp',
								rt 							= '$rt',
								rw 							= '$rw',
								desa 						= '$desa',
								kecamatan 					= '$kecamatan',
								kabupaten 					= '$kabupaten',
								wa                          = '$wa'
							   WHERE id	= '$id'
							   ";
		return $this->conn->query($query);
	}
	public function getPegawaiById($id){
		$sql = "SELECT * FROM pegawai WHERE id='$id'";
		return $this->conn->query($sql);
	}
}	