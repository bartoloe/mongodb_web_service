<?php
require('../mongodb/database.php');

	if(isset($_GET['email'])){
	$emailverif = htmlspecialchars($_GET['email']);
	$email = array('email' => $emailverif);
	$cursor = $collectionUsers->find($email);
	
	}else{
	$cursor = $collectionUsers->find();
		
	}
	/*	
	foreach($cursor as $result) {
    print_r($result);
}
*/
$data_to_encode = array();

foreach($cursor as $curs){
	//var_dump($curs);
    $data['_id'] = $curs['_id'];
    $data['prenom'] = $curs['prenom'];
    $data['email'] = $curs['email'];
    $data['langue'] = $curs['langue'];
    $data['sexe'] = $curs['sexe'];
    $data['birth'] = $curs['birth'];
	$data['date_inscription'] = $curs['date_inscription'];
	$data['last_connexion'] = $curs['date_last_connection'];
	$data['longitude'] = $curs['coordonnees']['longitude'];
	$data['latitude'] = $curs['coordonnees']['latitude'];
	$data['sujet'] = $curs['sujet'];
	$data['like'] = $curs['like'];
	$data_to_encode[] = $data;
}

print_r(json_encode($data_to_encode));
	 $mongo->close();
	 
?>
	