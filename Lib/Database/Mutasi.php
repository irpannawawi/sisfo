<?php namespace Lib\Database;
require_once 'Db.php';

class Mutasi extends Db{
	public function __construct(){
		parent::__construct();
	}

	public function getByNip($nip){
		$sql = "SELECT * FROM mutasi WHERE nip='$nip'";
		return $this->conn->query($sql);
	}

	public function update($nip,$pangkat,$tmt_pangkat,$gaji,$tmt_gaji,$pensiun,$tmt_pensiun,$ijasah,$tmt_ijasah) {

		$sql		= "UPDATE mutasi SET
		kenaikan_pangkat		= '$pangkat',
		tmt_kenaikan 			= '$tmt_pangkat',
		kenaikan_gaji 			= '$gaji',
		tmt_gaji				= '$tmt_gaji',
		pensiun 				= '$pensiun',
		tmt_pensiun 			= '$tmt_pensiun',
		ijasah 					= '$ijasah',
		tmt_ijasah 				= '$tmt_ijasah'
		WHERE nip	= '$nip'
		";

		return $this->conn->query($sql);
	}
}