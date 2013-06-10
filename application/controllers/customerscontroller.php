<?php 
 class CustomersController extends Controller
 {
	public function homepage()
	{
		$this->set("header", "Customer homepage");
	}
	
	public function add_to_cart($id, $number=1)
	{
		if ( !isset($_SESSION["tmp_cart"]))
		{
			$_SESSION["tmp_cart"] = new Shoppingcart();
			var_dump($_SESSION["tmp_cart"]);
		}
		//session_start();
		$product = $this->_model->find_product_by_id($id);
		//var_dump($product);
		$_SESSION["tmp_cart"]->add_to_cart($product,$number);
		//var_dump($_SESSION["tmp_cart"]);
	}	
	
	public function shopping_cart()
	{
		$products = "";
		$subtotaal = 0;
		foreach ($_SESSION['tmp_cart']->get_items() as $value)
		{
			$prijs = $value['price'];
			$aantal = $value['aantal'];
			$products .= "<tr>
							<td>".$value['id']."</td>
							<td>
							<img src='".BASE_URL."public/fotos/thumbnails/tn_"
								 .$value['foto_name']."' 
								 alt='".$value['foto_name']."' /></td>
							<td><b>".$value['name']."</b><br>
								".$value['description']."</td>
							<td>".$aantal."</td>
							<td>".$prijs."</td>
							<td>".$prijs * $aantal."</td>";
			$subtotaal += ($prijs * $aantal);
		}
		if ($subtotaal > 100)
		$this->set('foot',$subtotaal);
		else
		$this->set('foot',$subtotaal + 12.40);
		$this->set('header','dit zijn de items in uw winkelwagentje');
		$this->set('products',$products);
	}
 }
?>