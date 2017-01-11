<?php

require('../mongodb/database.php');
if(isset($_GET['infos']))
	{
		$infos = htmlentities($_GET['infos']);
		$arraylist = explode(",", $infos);
		var_dump($arraylist);
		$id_categorie = $arraylist[0];
		$lib_like = $arraylist[1];
		
		
		$values = array('_idlike' => new MongoId, 'lib_like' => $lib_like, 'date' => new MongoDate());
		
		

	
   $collectionCategories->update(array("_id"=> new MongoId($id_categorie)),  array('$push' => array('likes' => $values)));
   
   
	}	
