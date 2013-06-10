<?php
 class Shoppingcart
 {
	//Field
	private $items = array();
	
	public function get_items()
	{
		return $this->items;
	}
		
	public function add_to_cart($product, $number)
	{
		//var_dump ($product);
		foreach ($this->items as $key => $value)
		{
			if ( $value['id'] == $product[0]['Product']['product_id'] )
			{
				 $this->items[$key]['aantal'] += $number;
				header("location:".BASE_URL."users/homepage");
				var_dump ($this->items);
				return;
			}
		}
		$this->items[] = array( 'id' => $product[0]['Product']['product_id'],
							  'name' => $product[0]['Product']['product_name'] ,
							  'description' => $product[0]['Product']['product_description'] ,
							  'category' => $product[0]['Product']['category'] ,
							  'price' => $product[0]['Product']['product_price'], 							  
							  'foto_name' => $product[0]['Product']['foto_name'],    
							  'aantal' => $number);
		var_dump ($this->items);
		header("location:".BASE_URL."users/homepage");
	}
 }
?>