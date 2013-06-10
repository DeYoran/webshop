<?php
 class User extends Model
 {
	public function select_user_from_login($post)
	{
		return $this->query("SELECT * FROM acounts WHERE email = '".$post['username']."' AND password = '".$post['password']."'");
	}
	public function select_blog()
	{
		return $this->query("SELECT * FROM blog");
	}
 }
?>