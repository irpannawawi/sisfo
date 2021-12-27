<?php 
session_start();
if (empty($_SESSION['username']) OR empty($_SESSION['level'])) {
	header('location: '.BASE_URL);
}else{
	if ($_SESSION['level']!='User') {
	header('location: '.BASE_URL);
	}
}