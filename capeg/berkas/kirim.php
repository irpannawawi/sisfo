<?php  require_once '../../lib/autoload.php'; session_start();
use Lib\Database\Capeg;
$capegObj = new Capeg;

$res = $capegObj->kirimBerkas();
header('location:'.BASE_URL.'/capeg/berkas');