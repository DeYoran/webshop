<?php
	require_once '../scripts/mobileDetect/Mobile_Detect.php';
	switch($_SERVER['HTTP_HOST'])
	{
		case 'shift-band.nl' : 
		{	
			define('DB_NAME', 'qb101313_shift');
			define('DB_USER', 'qb101313_Shift');
			define('PASSWORD', 'RGutK4gj');
			define('DB_HOST', '84.241.180.138');
			define('BASE_URL', 'http://shift-band.nl');
			break;
		}
		
		case 'localhost' : 
		{	
			define('DB_NAME', 'shift-dev');
			define('DB_USER', 'root');
			define('PASSWORD', '');
			define('DB_HOST', 'localhost');
			define('BASE_URL', '/mvc.shift');
			break;
		}
		default : 
		{	
			echo '<script>alert("site location error")</script>';
			break;
		}
	}
	$detect = new Mobile_Detect;
	$deviceType = ($detect->isMobile() ? ($detect->isTablet() ? 'tablet' : 'phone') : 'computer');
	$scriptVersion = $detect->getScriptVersion();
	define ('DEVICETYPE',$deviceType);
?>