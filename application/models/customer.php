<?php
 class Customer extends Model
 {
	public function find_product_by_id($id)
	{
		$query = "SELECT * FROM `products` WHERE `product_id` = '".$id."'";
		//echo $query;exit();
		return $this->query($query);
	}
 }
?>