<?php
require('../mongodb/database.php');

	if(isset($_GET['infos']))
	{
		$infos = htmlspecialchars($_GET['infos']);
		$arraylist = explode(",", $infos);
		var_dump($arraylist);
	
		$id = $arraylist[0];
		$password = $arraylist[1];					
		$cursor = $collectionUsers->find(array('_id' => new MongoId($id), 'password' => $password));
		$curs = iterator_to_array($cursor);
	if(!empty($curs))
	{	
	$likecurrentuser = $collectionUserLikes->find(array('id' => new MongoId($id)));//Likes de l'user
	$arraylikecurrentuser = iterator_to_array($likecurrentuser, false);
	//array[0]['id_like] == 566d79acf6f388a81d000068
	var_dump($arraylikecurrentuser);
	$likeallusers = $collectionUserLikes->find();
	
	
	
	$arraylikeallusers = iterator_to_array($likeallusers, false);
	var_dump($arraylikeallusers);
	for($i =0; $i<$arraylikeallusers; $i++ ){
	if($arraylikeallusers[$i]['id_like'] == $likeallusers[$j]['id_like']){
		$count++;
		
	}
		
	}
	
	
	
	
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
	
	
	 $mongo->close();
	 
?>
	