<?php 
session_start();
if (empty($_SESSION['username'])) {
	header('location: '.BASE_URL.'/login.php');
}
