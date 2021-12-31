<?php  require_once '../../lib/autoload.php'; session_start();
use Lib\Database\Berkascapeg;
$berkasObj = new Berkascapeg;
$id = $_GET['id'];
$res = $berkasObj->delete($id);
if($res){
	header('location: '.BASE_URL.'/capeg/berkas');
}else{
	echo $berkasObj->conn->error;
}