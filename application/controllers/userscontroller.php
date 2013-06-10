<<<<<<< HEAD
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
=======
<?php class UsersController extends Controller {			public function login()	{		if (!empty($_POST['username']) && !empty($_POST['password']))		{						$user = $this->_model->select_user_from_login($_POST);			if ( sizeof($user) > 0)			{				//Zet session_start() in de index.php				$_SESSION['userrole'] = $user[0]['Userrole']['role'];				//var_dump($user);				switch ($user[0]['Userrole']['role'])				{					case "administrator":						$sendToPage = "../administrators/adminhomepage";					break;					case "root":						$sendToPage = "../roots/homepage";					break;				}				$header = "U bent succesvol ingelogd";			}			else			{				$header = "Wachtwoord en/of gebruikersnaam niet juist<br />						   U wordt doorgestuurd naar de homepage";				$sendToPage = "../users/viewall";			}		}		else		{			$header = "U heeft een van de velden niet ingevuld.<br />					   U wordt doorgestuurd naar de					   Homepage";			$sendToPage = "../users/viewall";		}		$this->set("header", $header);		header("refresh:1;url=".$sendToPage);	}		public function logout()	{		if ( isset($_SESSION['userrole']))		{			session_destroy();			header("location:../users/homepage");		}	}		public function homepage($offset=0)	{						$pagination = new Pagination($offset, 4, sizeof($this->_model->all_products()));		$select_products = 		$this->_model->select_all_products($pagination->get_records_per_page(),$offset);				//var_dump($select_products);		$products = "";		foreach ($select_products as $value)		{			$products .= "<tr>							<td>".$value['Product']['product_id']."</td>							<td>							<img src='".BASE_URL."public/fotos/thumbnails/tn_"								 .$value['Product']['foto_name']."' 								 alt='".$value['Product']['foto_name']."' /></td>							<td><b>".$value['Product']['product_name']."</b><br>								".$value['Product']['product_description']."</td>							<td>".$value['Product']['product_price']."</td>							<td><a href='".BASE_URL."customers/add_to_cart/".										   $value['Product']['product_id']."'>									<img src='".BASE_URL."public/img/shopcart32x32.png' 										 alt='shoppingcart picture' />								</a>							</td>						  </tr>";		}		$pagenumbers = "";		if ($pagination->get_current_page() != 1)		{			$pagenumbers .= "<a href='".BASE_URL."users/homepage/".									   ($pagination->get_current_page()-2) * $pagination->get_records_per_page().										 "'>&laquo;&nbsp;vorige</a>&nbsp;";		}		for ($i = 0; $i < $pagination->total_pages(); $i++)		{			$pagenumbers .= "<a href='".BASE_URL."users/homepage/".										$i * $pagination->get_records_per_page() .										"'>". ($i+1) . "</a> | ";		}		if ($pagination->get_current_page() < $pagination->total_pages())		{			$pagenumbers .= "<a href='".BASE_URL."users/homepage/".										($pagination->get_current_page()) * $pagination->get_records_per_page() .										 "'>&nbsp;volgende&nbsp;&raquo;</a>";		}		$this->set('header', 'Welkom bij uw online groentendealer');		$this->set('products', $products);		$this->set('pagenumbers', $pagenumbers);	}		public function register()	{		$this->_model->insert_register_data($_POST);		header("location:../users/homepage");	} }?>
>>>>>>> 8eac29eca5975d3592eeb51e369d1cf5368344b7
