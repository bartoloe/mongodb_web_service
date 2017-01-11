<?php

require('../mongodb/database.php');
if(isset($_GET['infos']))
	{
		$infos = htmlentities($_GET['infos']);
		$arraylist = explode(",", $infos);
		var_dump($arraylist);
	
		$id = $arraylist[0];
		$password = $arraylist[1];		
		$idrep = $arraylist[2];
		
		
		$values = array('_idreponse' => $idrep, 'date' => new MongoDate());
		
		
		

  $cursor = $collectionUsers->find(array('_id' => new MongoId($id), 'password' => $password));
	
	
	$curs = iterator_to_array($cursor);
	if(!empty($curs))
	{	
	
   $collectionUsers->update(array("_id"=> new MongoId($id)), array('$push' => array('like_reponse' => $values)));
   
   
	}	

	}else
	{
	echo 'bad credentials';
	}
	
