<?php
 class User extends Model
 {
	public function select_all()
	{
		return $this->query("SELECT * FROM `users`");
	}

	public function remove_user($id)
	{
		$this->query("DELETE FROM `users` WHERE `user_id` = '".$id."'");
	}
	
	public function insert_into_users($post)
	{
		$this->query("INSERT INTO `users`(`id`, `firstname`, `infix`, `surname`) VALUES  ('NULL','{$post[fisrtname]}','{$post[infix]}','{$post[surname]}');");
	}
	
	public function update_user($post)
	{
		$this->query("UPDATE `users` SET `firstname` = '{$post[fisrtname]}', `infix` = '{$post[infix]}', `surname` = '{$post[surname]}'
									WHERE id = '{$post[id]}'");
	}
	
	public function find_user_by_id($id)
	{
		$this->query("SELECT * FROM `users` WHERE `user_id` = '".$id."'");
	}
 }
?>