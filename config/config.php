<?php
	require_once '../scripts/mobileDetect/Mobile_Detect.php';
	define('DB_NAME', 'shift-dev');
	define('DB_USER', 'root');
	define('PASSWORD', '');
	define('DB_HOST', 'localhost');
	define('BASE_URL', '/mvc.shift');
	$detect = new Mobile_Detect;
	$deviceType = ($detect->isMobile() ? ($detect->isTablet() ? 'tablet' : 'phone') : 'computer');
	$scriptVersion = $detect->getScriptVersion();
	define ('DEVICETYPE',$deviceType);
?>