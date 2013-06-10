<?php
 class UsersController extends Controller
 {
	
	public function homepage($page = 'home')
	{
		$this->set('page',$page);
	}
	
	public function pics()
	{
	
	}
	
	public function vids()
	{
	
	}
	
	public function login()
	{
		if (!empty($_POST['username']) && !empty($_POST['password']))
		{			
			$user = $this->_model->select_user_from_login($_POST);
			if ( sizeof($user) > 0)
			{
				//Zet session_start() in de index.php
				$_SESSION['userrole'] = $user[0]['Acount']['role'];
				//var_dump($user);
				switch ($user[0]['Acount']['email'])
				{
					case "admin":
						$sendToPage = "../admins/adminhomepage";
					break;
					case "root":
						$sendToPage = "../roots/homepage";
					break;
				}
				$header = "U bent succesvol ingelogd";
			}
			else
			{
				$header = "Wachtwoord en/of gebruikersnaam niet juist<br />
						   U wordt doorgestuurd naar de homepage";
				$sendToPage = "../users/homepage";
			}
		}
		else
		{
			$header = "U heeft een van de velden niet ingevuld.<br />
					   U wordt doorgestuurd naar de
					   Homepage";
			$sendToPage = "../users/homepage";
		}
		$this->set("header", $header);
		header("refresh:1;url=".$sendToPage);
	}
	
	public function logout()
	{
		session_destroy();
		header("location: ".BASE_URL."/users/homepage");
	}
	
	public function music()
	{
		if ( ! isset ($_SESSION['userrole']))
		{
			header("location:".BASE_URL."/users/homepage");
		}
		else
		{
			
		}
	}
	public function blog()
	{
		$divlist = '';
		$data = $this->_model->select_blog();
		foreach ( $data as $key )
		{
		$divlist .= 
		'<div class="blog">
		<table>
			<tbody>
				<tr><td colspan="2">
				' ;
				if (file_exists(BASE_URL.'/public/img/'.$key['Blog']['poster'].'.png'))
						$divlist .= '<img src="'.BASE_URL.'/public/img/'.$key['Blog']['poster'].'.png">';
				else
						$divlist .= '<img src="'.BASE_URL.'/public/img/avatar-external.jpg">';
					$divlist .= '</td>
					<td class="naam">
						'.$key['Blog']['poster'].'
					</td>
				</tr>
				<tr>
					<td class="col1">				
					</td>
					<td class="col2">				
					</td>
					<td class="col3">				
					</td>
				</tr>
				<tr>
					<td class="emptyspace">
						&nbsp;
					</td>
					<td colspan="2" class="blog">
						'.$key['Blog']['content'].'
					</td>
				</tr>
			</tbody>
		</table>
		</div>';
		}
		$this->set('divs',$divlist);
	}
	
	
 }
?>