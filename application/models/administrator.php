<?php
 class Administrator extends Model
 {
	public function select_all()
	{
		return $this->query("SELECT *
							 FROM `users`, `userroles`
							 WHERE `users`.`user_id` = `userroles`.`userrole_id`");
	}
	
	public function select_all_userroles()
	{
		$query = "SELECT DISTINCT `role` FROM `userroles`";
		return $this->query($query);
	}
	
	public function insert_into_users($post)
	{
		$query =  "INSERT INTO `logins` ( `login_id`,
										 `username`,
										 `password`)
				  VALUES			   ( NULL,
										 '".$post['emailaddress']."',
										 '".$post['password']."')";
		$this->query($query);
		$id = $this->find_last_inserted_id();
		
		$query = "INSERT INTO `users` ( `user_id`,
										`firstname`,
										`infix`,
										`surname`)
				  VALUES			  ( '".$id."',
										'".$post['firstname']."',
										'".$post['infix']."',
										'".$post['surname']."')";
		$this->query($query);
		$query = "INSERT INTO `userroles` ( `userrole_id`,
											`role`)
				  VALUES				  ( '".$id."',
											'".$post['userrole']."')";
		$this->query($query);
	}
	
	public function remove_user($id)
	{
		$this->query("DELETE FROM `users` WHERE `user_id` = '".$id."'");
	}
	
	public function update_user($id, $post)
	{
		$query = "UPDATE `users` SET `firstname` = '".$post['firstname']."',
									 `infix`	 = '".$post['infix']."',
									 `surname`	 = '".$post['surname']."'
				  WHERE				 `user_id`	 = '".$id."'";
		$this->query($query);
		$query = "UPDATE `userroles` SET `role` = '".$post['userrole']."'
				  WHERE  `userroles`.`userrole_id` = '".$id."'";
		echo $query;
		$this->query($query);
	}
	
	public function find_user_by_id($id)
	{
		$query = "SELECT * FROM `users`, `userroles`
							 WHERE `user_id` = '".$id."'
							 AND `users`.`user_id` = `userroles`.`userrole_id`";
		//echo $query;exit();
		return $this->query($query, 1);
	}
	
	public function insert_item_into_products($post, $files)
	{
		//var_dump($files);		
		$query = "INSERT INTO `products` ( `product_id`,
										   `product_name`,
										   `product_description`,
										   `product_price`,
										   `foto_name`)
							VALUES		 ( NULL,
										   '".$post['product_name']."',
										   '".$post['product_description']."',
										   '".$post['product_price']."',
										   '".$files['foto']['name']."')";
		$this->query($query);
	}
 }
?>