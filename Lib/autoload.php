<?php 
include 'config.php';
$app_dir = parse_url($base_url);
$protocol = isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on'?'https://':'http://';
define("BASE_URL", $protocol.$_SERVER['HTTP_HOST'].$app_dir['path']);


spl_autoload_register(function( $class ){
	$class = explode('\\', $class);
	$class = end($class);
	require_once __DIR__.'/Database/'.$class.'.php';
});