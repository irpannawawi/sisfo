<?php 
session_start();
if (empty($_SESSION['username']) OR empty($_SESSION['level'])) {
	header('location: '.BASE_URL.'/login.php');
}else{
	if ($_SESSION['level']!='Admin') {
	header('location: '.BASE_URL.'/login.php');
	}
}