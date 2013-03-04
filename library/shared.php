<?php
	function callHook($url)
	{
		$urlArray = explode('/', $url);
		//var_dump($urlArray);
		$controller = $urlArray[0];
		//echo $controller;
		array_shift($urlArray);
		//var_dump($urlArray);
		$action = $urlArray[0];
		array_shift($urlArray);
		var_dump($urlArray);
		echo $action;
	}
	
	function __autoload($classname)
	{
		
	}
	
	callHook($url);
?>