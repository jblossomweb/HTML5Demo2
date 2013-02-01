<?php require_once 'mysql.php';

class query {
	
	function latest_products($limit){
	
		$db = new mysql(); // connect
	
		$result = $db->query('
			SELECT
				productID as id,
				name,
				CONCAT("$", FORMAT(price, 2)) as price,
				img,
				featured
			FROM
				products
			WHERE
				active = 1
			ORDER BY
				featured DESC,
				updated DESC,
				price DESC
			LIMIT
				:limit
		',array(
			':limit'	=> $limit
		));
		
		$db = null; // disconnect
		
		return $result; 
	}
	
	function get_product($id){
	
		$db = new mysql(); // connect
	
		$result = $db->query('
			SELECT
				productID as id,
				name,
				CONCAT("$", FORMAT(price, 2)) as price,
				price as price_numeric,
				text,
				img,
				featured
			FROM
				products
			WHERE
				productID = :id
		',array(
			':id'	=> intval($id)
		));
		
		$db = null; // disconnect
		
		return $result[0]; 
	}
   
}