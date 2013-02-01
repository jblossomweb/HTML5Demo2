<?php require_once 'query.php';

class Model {

	function __construct(){
		$this->query = new query();
	}
   
   public function home($uri) {
   
		$data = array(
			'list'		=>	true,
			'products' 	=> 	$this->query->latest_products(3),
		);
		
		return $data;
   }
   
   public function products($uri) {
   
		if( (count($uri) > 1) && (intval($uri[1]) > 0) ) {
			
			$data = array(
				'list'		=> false,
				'product' 	=> $this->query->get_product(intval($uri[1])),
			);
			
		} else {
   
			$data = array(
				'list'		=>	true,
				'products' 	=> 	$this->query->latest_products(18), // set max to 18 for now
			);
		
		}
		
		return $data;
   }
   
   public function cart($uri) {
   
		if (array_key_exists(CART_COOKIE, $_COOKIE)){
		
			$cartObject = json_decode($_COOKIE[CART_COOKIE]);
			
			if (count($cartObject)){
			
				$items = array();
				foreach($cartObject as $item) {
				
					$product = $this->query->get_product(intval($item->id));
					
					$items[]= array(
						'id'	=>	intval($item->id),
						'qty'	=>	intval($item->qty),
						'name'	=>	$product['name'],
						'price'	=>	$product['price'],
						'numeric'	=>	floatval($product['price_numeric']),
						'img'	=>	$product['img'],
						'cost'	=>	intval($item->qty) * floatval($product['price_numeric']),
					);
					
				}
				
				$data = array(
					'cart'		=>	$items,
				);
			
				return $data;
				
			} else {
				return false;
			}
		} else {
			return false;
		}
   }
   

   public function __call($method,$params){
		//some views are static. magic catch-all.
   }
}
