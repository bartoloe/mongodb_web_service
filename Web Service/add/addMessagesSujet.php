<?php

require('../mongodb/database.php');

	if(isset($_GET['infos']))
	{
		$infos = htmlspecialchars($_GET['infos']);
		$arraylist = explode(",", $infos);
		var_dump($arraylist);
	
		$id = $arraylist[0];
		$password = $arraylist[1];	
		$id_sujet = $arraylist[2];
		
		
		

  $cursor = $collectionUsers->find(array('_id' => new MongoId($id), 'password' => $password));
	
	
	$curs = iterator_to_array($cursor);
	if(!empty($curs))
	{	
		if(isset($_GET['content']))
		{		
		$content = htmlspecialchars($_GET['content']);
		$arrayContent = array(
		'content' => $content,
		'auteur' => new MongoId($id),
		'sujet' => new MongoId($id_sujet)		
		);
		$collectionMessages->insert($arrayContent);
		}
		else
		{
		echo 'No content';
		}
	}
	else
	{
	echo 'bad credentials';
	}
	}
	
   
	
	
	
	
	 $mongo->close();
	


function verifContent($content){
	$content = htmlspecialchars($content);
	if(strlen($content) > 48){
		echo 'Message trop long';
	}
	
	echo 'Wrong Message \n';
	exit;
}



?>