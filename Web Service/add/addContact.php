<?php

require('../mongodb/database.php');
if(isset($_GET['infos']))
	{
		$infos = htmlentities($_GET['infos']);
		$arraylist = explode(",", $infos);
		var_dump($arraylist);
	
		$id = $arraylist[0];
		$password = $arraylist[1];	
		
		
		

  $cursor = $collectionUsers->find(array('_id' => new MongoId($id), 'password' => $password));
	
	
	$curs = iterator_to_array($cursor);
	if(!empty($curs))
	{	
		
if(isset($_GET['contact'])){
$contact = htmlspecialchars($_GET['contact']);
	
	$contacts = array('id' => new MongoId($id), 'id_contact' => $contact);
	
   
   $collectionContacts->insert($contacts);
   $ID = $contacts['_id'];
	echo $ID;
}
		
	
	}
	else
	{
	echo 'bad credentials';
	}
	}
