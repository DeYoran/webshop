<?php
 class MusiciansController extends Controller
 {
	public function options()
	{
		$css = file_get_contents('../public/css/computer.css');

		//
		preg_match_all( '/(?ims)([a-z0-9\s\.\:#_\-@]+)\{([^\}]*)\}/', $css, $arr);

		$result = array();
			$table = '';
		foreach ($arr[0] as $i => $x)
		{
			$selector = trim($arr[1][$i]);
			$rules = explode(';', trim($arr[2][$i]));
			$result[$selector] = array();
			$result[$selector]['selector'] = $selector;
			foreach ($rules as $strRule)
			{
				if (!empty($strRule))
				{
					$rule = explode(":", $strRule);
					$result[$selector][trim($rule[0])] = trim($rule[1]);
				}
			}
		}   $result['']['selector'] = 'default-values';

		$this->set('css',$result);
	}
	
	public function writefiles()
	{
		$key = array_search('home', $_POST); // $key = 2;
		echo $key;
		foreach($_POST as $key => $value)
		{
		file_put_contents("../application/views/users/".$key.".php", $value);
		}
		header('location: '.BASE_URL.'/musicians/options');
	}
 }
?>