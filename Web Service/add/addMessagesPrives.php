<?php

require('../mongodb/database.php');
if(isset($_GET['infos']))
	{
		$infos = htmlentities($_GET['infos']);
		$arraylist = explode(",", $infos);
		var_dump($arraylist);
	
		$id = $arraylist[0];
		$password = $arraylist[1];		
		$content = $arraylist[2];
		if(isset($_GET['destinataires'])){
		$destinataires = htmlentities($_GET['destinataires']);
		$arraydest = explode(",", $destinataires);
		for($i = 0; $i<count($arraydest); $i++){
			$arraydest[$i] = new MongoId($arraydest[$i]);
		}
		
		$values = array('_iddestinataires' => $arraydest, 'contenu' => $content, 'date' => new MongoDate());
		
		
		

  $cursor = $collectionUsers->find(array('_id' => new MongoId($id), 'password' => $password));
	
	
	$curs = iterator_to_array($cursor);
	if(!empty($curs))
	{	
	
   
   $collectionUsers->update(array("_id"=> new MongoId($id)), array('$push' => array('messages_prives' => $values)));
   
   
	}	

	}
	}else
	{
	echo 'bad credentials';
	}
	
