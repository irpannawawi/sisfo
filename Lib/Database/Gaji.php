<?php namespace Lib\Database;
require_once 'Db.php';

class Gaji extends Db{
	public function __construct(){
		parent::__construct();
	}

	public function getGajiBulanan($nip, $bulan, $tahun){
		$sql = "SELECT * FROM gaji WHERE nip='$nip' AND year(tgl_gaji)='$tahun' AND month(tgl_gaji)='$bulan'";
		return $this->conn->query($sql);
	}

	public function getGajiById($id){
		$sql = "SELECT * FROM gaji WHERE id='$id'";
		return $this->conn->query($sql);
	}

	public function getGajiBersih($nip){
		$sql = "SELECT * from gaji WHERE nip='$nip' AND gaji_bersih > 0";
		$res = $this->conn->query($sql);
		if ($res->num_rows >=1) {
			return $res;
		}else{
			return 0;
		}
	}

	public function insert($nip,$gaji_pokok,$tunj_istri,$tunj_anak,$tunj_hselon,$tunj_fung_umum,$tunj_fungsional,$tunj_kusus,$tunj_terpencil,$tkd,$tunj_beras,$tunj_pajak,$tunj_bpjs,$tunj_jkk,$tunj_jkm,$pembulatan,$pot_pajak,$pot_bpjs,$pot_iwp_21,$pot_iwp_81,$pot_tapebum,$pot_jkk,$pot_jkm,$hutang,$bulog,$sewa,$tgl,$gaji_bersih){
		// SQL
				$q1 	= $this->conn->query("SELECT * FROM gaji ORDER BY id DESC");
				$dt 	= mysqli_fetch_array($q1);
				$id		= $dt['id']+1;

				$query		= "INSERT INTO gaji VALUES
							   ('$id','$nip','$gaji_pokok','$tunj_istri','$tunj_anak','$tunj_hselon','$tunj_fung_umum','$tunj_fungsional','$tunj_kusus','$tunj_terpencil','$tkd','$tunj_beras','$tunj_pajak','$tunj_bpjs','$tunj_jkk','$tunj_jkm','$pembulatan','$pot_pajak','$pot_bpjs','$pot_iwp_21','$pot_iwp_81','$pot_tapebum','$pot_jkk','$pot_jkm','$hutang','$bulog','$sewa','$tgl','$gaji_bersih')";
				return $this->conn->query($query);
	}

	public function update($id,$gaji_pokok,$tunj_istri,$tunj_anak,$tunj_hselon,$tunj_fung_umum,$tunj_fungsional,$tunj_kusus,$tunj_terpencil,$tkd,$tunj_beras,$tunj_pajak,$tunj_bpjs,$tunj_jkk,$tunj_jkm,$pembulatan,$pot_pajak,$pot_bpjs,$pot_iwp_21,$pot_iwp_81,$pot_tapebum,$pot_jkk,$pot_jkm,$hutang,$bulog,$sewa,$tgl,$gaji_bersih){
		$sql = "UPDATE gaji SET
								gaji_pokok					= '$gaji_pokok',
								tunj_istri					= '$tunj_istri',
								tunj_anak					= '$tunj_anak',
								tunj_hselon					= '$tunj_hselon',
								tunj_fung_umum				= '$tunj_fung_umum',
								tunj_fungsional				= '$tunj_fungsional',
								tunj_khusus					= '$tunj_kusus',
								tunj_terpencil 				= '$tunj_terpencil',
								tkd							= '$tkd',
								tunj_beras					= '$tunj_beras',
								tunj_pajak					= '$tunj_pajak',
								tunj_bpjs					= '$tunj_bpjs',
								tunj_jkk					= '$tunj_jkk',
								tunj_jkm					= '$tunj_jkm',
								pembulatan					= '$pembulatan',
								pot_pajak					= '$pot_pajak',
								pot_bpjs					= '$pot_bpjs',
								pot_iwp_21					= '$pot_iwp_21',
								pot_iwp_01					= '$pot_iwp_81',
								pot_tapebum					= '$pot_tapebum',
								pot_jkk						= '$pot_jkk',
								pot_jkm						= '$pot_jkm',
								hutang 						= '$hutang',
								bulog 						= '$bulog',
								sewa_rumah 					= '$sewa',
								tgl_gaji 					= '$tgl',
								gaji_bersih					= '$gaji_bersih'
							   WHERE id='$id'
							   ";
		return $this->conn->query($sql);
	}
}
