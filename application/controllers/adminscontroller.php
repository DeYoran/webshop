<?php
 class AdminsController extends Controller
 {
	
	public function server()
	{
		$string = '';
		foreach($_SERVER as $server['name'] => $server['value'])
		$string.= "<tr><td>".$server['name']."</td><td>".$server['value']."</tr></td>";
		$this->set('array',$string);
	}
 }
?>