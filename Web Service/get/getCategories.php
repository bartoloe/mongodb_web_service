<?php
require('../mongodb/database.php');

	$cursor = $collectionCategories->find();
		
$data_to_encode = array();
//var_dump($cursor);
foreach($cursor as $curs){
	
	//var_dump($curs);
    $data['_id'] = $curs['_id'];
    $data['lib_cat'] = $curs['lib_cat'];
    $data['date'] = $curs['date'];
    $data['likes'] = $curs['likes'];    
	$data_to_encode[] = $data;
}

print_r(json_encode($data_to_encode));
	 $mongo->close();
	
	 
?>
	