<?php

require('../mongodb/database.php');
if(isset($_GET['infos']))
	{
		$infos = htmlentities($_GET['infos']);
		$arraylist = explode(",", $infos);
		var_dump($arraylist);
	
		$id = $arraylist[0];
		$password = $arraylist[1];
		$idsuj = $arraylist[2];
		$content = $arraylist[3];
		
		$values = array('_idsujet' => new MongoId($idsuj), 'id_reponse' => new MongoId(),'contenu' => $content, 'date' => new MongoDate());
		
		
		

  $cursor = $collectionUsers->find(array('_id' => new MongoId($id), 'password' => $password));
	
	
	$curs = iterator_to_array($cursor);
	if(!empty($curs))
	{	
	
   
   $collectionUsers->update(array("_id"=> new MongoId($id)), array('$push' => array('reponses' => $values)));
   
   
}	else
	{
	echo 'bad credentials';
	}
	}
