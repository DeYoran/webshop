<?php
 class User extends Model
 {
		
	public function select_all()
	{
		return $this->query("SELECT *
							 FROM `users`, `userroles`
							 WHERE `users`.`user_id` = `userroles`.`userrole_id`");
	}
	
	

	
	
	public function select_user_from_login($post)
	{
		$query = "SELECT *
				  FROM   `userroles`, `logins`
				  WHERE  `userroles`.`userrole_id` = `logins`.`login_id`
				  AND    `logins`.`username` = '".$post['username']."'
				  AND	 `logins`.`password` = '".$post['password']."'";
		return $this->query($query);
	
	}
	
	public function insert_register_data($post)
	{
		$query = "INSERT INTO `logins` 
				  SET `username` = '".$post['emailaddress']."',
					  `password` = '".$post['password']."'";
		//echo $query;exit(); //invoeren in sql binnen phpmyadmin
		$this->query($query);
		$id = $this->find_last_inserted_id();
		$query = "INSERT INTO `users` 
				  SET `user_id` = '".$id."',
					  `firstname` = '".$post['firstname']."',
					  `infix` = '".$post['infix']."',
					  `surname` = '".$post['surname']."',
					  `street` = '".$post['street']."',
					  `housenumber` = '".$post['housenumber']."',
					  `zipcode` = '".$post['zipcode']."',
					  `residence` = '".$post['residence']."',
					  `phonenumber` = '".$post['phonenumber']."',
					  `mobilephonenumber` = '".$post['mobilephonenumber']."'";
		$this->query($query);
		$query = "INSERT INTO `userroles` ( `userrole_id`,
											`role`)
								VALUES	  ( '".$id."',
											'customer')";
		$this->query($query);
	}
	
	public function select_all_products($limit=4, $offset=0)
	{
		$query = "SELECT * FROM `products` LIMIT ".$limit." OFFSET ".$offset;
		return $this->query($query);
	}
	
	public function all_products()
	{
		$query = "SELECT * FROM `products`";
		return $this->query($query);
	}
 }
?>