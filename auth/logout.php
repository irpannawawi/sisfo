<?php
require_once '../lib/autoload.php';
session_start();
$level = $_SESSION['level'];
session_destroy();
if($level == 'Admin'){
header('location: '.BASE_URL.'/admin');
}else if ($level == 'User') {
header('location: '.BASE_URL);
}