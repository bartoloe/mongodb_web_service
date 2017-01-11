<?php
require('../mongodb/database.php');

	if(isset($_GET['like'])){
	$like = htmlspecialchars($_GET['like']);
	$arraylike = array('_id' => new MongoId($like));
	$cursor = $collectionCategories->find($arraylike);
	
	}else{
		echo 'Erreur like';
		
	}
	/*	
	foreach($cursor as $result) {
    print_r($result);
}
*/
$data_to_encode = array();
var_dump($cursor);
foreach($cursor as $curs){
	//var_dump($curs);
    $data['likes'] = $curs['likes'];    
	$data_to_encode[] = $data;
}

print_r(json_encode($data_to_encode));
	 $mongo->close();
	 
?>
	
