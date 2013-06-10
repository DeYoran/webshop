<?php
 class AdministratorsController extends Controller
 {
	public function adminhomepage()
	{
		$this->set("header", "Dit is de admin homepage");
	}
	
	public function viewall()
	{
		$this->set('header', 'Geregistreerde gebruikers van de webshop');
		$users = $this->_model->select_all();
		//var_dump($users);
		$show_table = '';
		foreach ($users as $value)
		{
			$show_table .= "<tr>
								<td class='td'>".$value['User']['user_id']."</td>
								<td class='td'>".$value['User']['firstname']."</td>
								<td class='td'>".$value['User']['infix']."</td>
								<td class='td'>".$value['User']['surname']."</td>
								<td class='td'>".$value['Userrole']['role']."</td>
								<td class='td'><a href='./remove_user/".$value['User']['user_id']."'>
										<img src='../img/drop.png' alt='drop' />
									</a>
								</td>
								<td class='td'><a href='./update_user/".$value['User']['user_id']."'>
										<img src='../img/edit.png' alt='drop' />
									</a>
								</td>
						    </tr>";
		
		}
		$this->set('show_users', $show_table);
	}
	
	public function add_user()
	{
		if (isset($_POST['submit']))
		{
			$this->_model->insert_into_users($_POST);
			header('location:../administrators/viewall');
		}
		else
		{
			$roles = $this->_model->select_all_userroles();
			//var_dump($roles);
			$userroles = '';
			foreach ($roles as $value)
			{ 
				$userroles .= "<option value='".$value['Userrole']['role']."'>".$value['Userrole']['role']."</option>";
			}
			$this->set('userroles', $userroles);
			$this->set('header', 'Voeg een gebruiker toe');
		}
	}
	
	public function remove_user($id)
	{
		$this->_model->remove_user($id);
		header('location:../viewall');
	}
	
	public function update_user($id)
	{
		if (isset($_POST['submit']))
		{
			$this->_model->update_user($id, $_POST);
			header('location:../viewall');
		}
		else
		{
			$user = $this->_model->find_user_by_id($id);
			//var_dump($user);
			$get_userroles = $this->_model->select_all_userroles();
			//var_dump($get_userroles);
			$userroles = "";
			foreach ($get_userroles as $value)
			{
				if ( $value['Userrole']['role'] == $user['Userrole']['role'])
				{
					$selected = "selected";
				}
				else
				{
					$selected = "";
				}
				$userroles .= "<option value='".$value['Userrole']['role']."' ".$selected.">".
									$value['Userrole']['role'].
							  "</option>";
			}
			$this->set('user', $user);
			$this->set('header', 'Wijzig het onderstaande record');
			$this->set('userroles', $userroles);
			$this->set('id', $id);
		}
	}
	
	public function add_product()
	{
		if ( isset($_POST['submit']) )
		{
			$mime_type = array('image/png', 'image/jpeg', 'image/pjpeg', 'image/gif');
			if (in_array( $_FILES['foto']['type'], $mime_type))
			{
				$dir = 'fotos/';
				if ( !file_exists($dir) )
				{
					//Maak een directory aan.
					mkdir($dir, 0777, true);
					//Maak daarin een thumbnaildirectory aan.
					mkdir($dir."thumbnails/", 0777, true);
				}				
				//Check of de file die we gaan opslaan wel een geuploade file is uit het formulier
				if (is_uploaded_file($_FILES['foto']['tmp_name']))
				{
					//Verplaats het bestand van de tijdelijke directory naar de directory van de klant
					move_uploaded_file($_FILES['foto']['tmp_name'], $dir.$_FILES['foto']['name']);
				}
				
				//Het maken van de thumbnail
				//Stel een standaard breedte en hoogte in voor de thumbnail
				define('THUMB_SIZE', 80);
				//Pad naar de grote foto
				$path_photo = $dir.$_FILES['foto']['name'];
				//Definieer het pad naar de thumbnail
				$path_thumbnail = $dir."thumbnails/tn_".$_FILES['foto']['name'];
				//Vraag de hoogte en de breedte op van de originele foto $specs_image[0] = breedte $specs_image[1] = hoogte 
				$specs_image = getimagesize($path_photo);
				//De verhouding berekenen
				$ratio_image = $specs_image[0]/$specs_image[1];
				//Als $ratio_image > 1 => landscape foto. Als $ratio_image < 1 => portrait foto. Als $ratio_image = 1 => square foto.
				if ($ratio_image >= 1)
				{
					//Landscape
					$tn_width = THUMB_SIZE;
					$tn_height = THUMB_SIZE/$ratio_image; 
				}
				else
				{
					//Portrait
					$tn_height = THUMB_SIZE;
					$tn_width = THUMB_SIZE * $ratio_image;
				}
				//Dit is het zwarte stuk karton waarop de foto wordt geplakt
				$thumb = imagecreatetruecolor($tn_width, $tn_height);
				
				//Kijk van welk mime-type de foto is
				switch ($_FILES['foto']['type'])
				{
					case 'image/jpeg':
						//Dit wordt het fotootje dat er wordt opgeplakt
						$source = imagecreatefromjpeg($path_photo);
						//Deze funktie bepaalt hoe de foto op het zwarte stuk karton wordt geplakt
						imagecopyresampled($thumb,
										   $source,
										   0,
										   0,
										   0,
										   0,
										   $tn_width,
										   $tn_height,
										   $specs_image[0],
										   $specs_image[1]);
						imagejpeg($thumb, $path_thumbnail, 100);
						break;
					case 'image/png':
						//Dit wordt het fotootje dat er wordt opgeplakt
						$source = imagecreatefrompng($path_photo);
						//Deze funktie bepaalt hoe de foto op het zwarte stuk karton wordt geplakt
						imagecopyresampled($thumb,
										   $source,
										   0,
										   0,
										   0,
										   0,
										   $tn_width,
										   $tn_height,
										   $specs_image[0],
										   $specs_image[1]);
						imagepng($thumb, $path_thumbnail, 9);			
						break;
					case 'image/gif':
						//Dit wordt het fotootje dat er wordt opgeplakt
						$source = imagecreatefromgif($path_photo);
						//Deze funktie bepaalt hoe de foto op het zwarte stuk karton wordt geplakt
						imagecopyresampled($thumb,
										   $source,
										   0,
										   0,
										   0,
										   0,
										   $tn_width,
										   $tn_height,
										   $specs_image[0],
										   $specs_image[1]);
						imagegif($thumb, $path_thumbnail);	
						break;		
				}
			}
			else
			{
				
			}
			$this->_model->insert_item_into_products($_POST, $_FILES);
		}
		$this->set('header', 'Voeg een product toe');
		
	}
 }
?>