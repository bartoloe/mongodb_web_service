<?php

function verifLangue($langue){
	
	$listLangue = array('fr', 'en', 'es', 'nl');
	
	if(in_array($langue, $listLangue)){
		return $langue;
	}else{		
		echo json_encode(array("error" => 'langue'));
		return "false";
	}
}

function verifBirth($birth){
	
	if(preg_match("/[0-9]{2}\/[0-9]{2}\/[0-9]{4}/", $birth)){
		return $birth;
	} else{
		
		echo json_encode(array("error" => 'birth'));
		return "false";
	}
}


function verifPrenom($prenom){
	if(strlen($prenom) > 20){
		
		echo json_encode(array("error" => 'prenom'));
		return "false";
	}else{
		return $prenom;
	}
	
}

	
function verifMail($email)
{
	global $collectionUsers;
	
		$email = htmlentities($email);
		
	if (!filter_var($email, FILTER_VALIDATE_EMAIL)) 
	{
		echo json_encode(array("error" => 'invalid email'));
		return "false";
	}
	$cursor = $collectionUsers->find(array('email' => $email));
	$curs = iterator_to_array($cursor);
	if(!empty($curs))
		{	
	echo json_encode(array("error" => 'existing email'));
	return "false";
		}else{
			
		return $email;
		}
		
}


function verifSexe($sexe){
	
	$listSex = array('M', 'F');
	if(in_array($sexe, $listSex))
	{	
		return $sexe;
	}
	else
	{
		echo json_encode(array("error" => 'sexe'));	
		return "false";
	}	
}



function verifLong($longitude){
	
	if(preg_match('/^(\+|-)?(?:90(?:(?:\.0{1,6})?)|(?:[0-9]|[1-8][0-9])(?:(?:\.[0-9]{1,6})?))$/', $longitude)){
		return $longitude;
	}else{
		
		echo json_encode(array("error" => 'longitude'));	
	return false;
	}
	
}

function verifLat($latitude){
	
	
	if(preg_match('/^(\+|-)?(?:180(?:(?:\.0{1,6})?)|(?:[0-9]|[1-9][0-9]|1[0-7][0-9])(?:(?:\.[0-9]{1,6})?))$/', $latitude)){
		
		return $latitude;
	}else{
		echo json_encode(array("error" => 'latitude'));	
	return false;
	}
	
}

?>