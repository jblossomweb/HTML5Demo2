<?php 

// basic json service 

if (isset($_POST) && array_key_exists('id',$_POST)) {
	
	$id = intval($_POST['id']);

	require_once '../application/settings.php';
	require_once '../application/query.php';
	$query = new query();
	$product = $query->get_product($id);
	echo json_encode($product);

}

?>