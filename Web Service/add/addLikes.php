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
		
if(isset($_GET['like'])){
$like = htmlspecialchars($_GET['like']);
	


	$likes = array('id_like' => $like);
	
   
   $collectionUsers->update(array("_id"=> new MongoId($id)), array('$push' => array('like' => new MongoId($like))));
  
}
		
	
	}
	else
	{
	echo 'bad credentials';
	}
	}
