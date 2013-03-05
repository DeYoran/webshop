<?php
	define('DS', DIRECTORY_SEPARATOR);
	//echo DS;
	define('ROOT',dirname(dirname(__file__)));
	// ROOT;
	$url = (isset($_GET['url'])) ? $_GET['url'] : 'users/viewall/1/2/3';
	//echo $url;
	require_once(ROOT.DS.'library'.DS.'bootstrap.php');
?>