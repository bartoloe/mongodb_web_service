<?php

require('../mongodb/database.php');
if(isset($_GET['infos']))
	{
		$infos = htmlentities($_GET['infos']);
		$arraylist = explode(",", $infos);
		var_dump($arraylist);
	
		$id = $arraylist[0];
		$password = $arraylist[1];
		$lib_categorie = $arraylist[2];
		$content = $arraylist[3];
		
		$values = array('_idsujet' => new MongoId(), 'categorie' => $lib_categorie, 'contenu' => $content, 'date' => new MongoDate());
		
		
		

  $cursor = $collectionUsers->find(array('_id' => new MongoId($id), 'password' => $password));
	
	
	$curs = iterator_to_array($cursor);
	if(!empty($curs))
	{	
	
   
   $collectionUsers->update(array("_id"=> new MongoId($id)), array('$push' => array('sujet' => $values)));
   
   
}	else
	{
	echo 'bad credentials';
	}
	}
