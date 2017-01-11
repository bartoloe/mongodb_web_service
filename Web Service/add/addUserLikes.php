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
	
	$likes = array('id' => new MongoId($id), 'id_like' => $like);
	
   
   $collectionUserLikes->insert($likes);
   $ID = $likes['_id'];
	echo $ID;
}
		
	
	}
	else
	{
	echo 'bad credentials';
	}
	}
