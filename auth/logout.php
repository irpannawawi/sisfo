<?php
require_once '../lib/autoload.php';
session_start();
$level = $_SESSION['level'];
session_destroy();
if($level == 'Admin' OR $level == 'Bendahara'){
header('location: '.BASE_URL.'/admin');
}else{
header('location: '.BASE_URL);
}