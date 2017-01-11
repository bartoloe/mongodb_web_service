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
	var_dump($arraylikecurrentuser);
	$likeallusers = $collectionUserLikes->find();
	
	$arraylikeallusers = iterator_to_array($likeallusers, false);
	var_dump($arraylikeallusers);
	for($j=0; $j<count($arraylikeallusers); $j++){
		
	for($i=0; $i<count($arraylikecurrentuser); $i++){
		
	$resultuserlikematches = $collectionUserLikes->find(array('id_like' =>  $arraylikecurrentuser[$i]['id_like'], array('_id' => new MongoId($arraylikeallusers[$j]['id']))));
	$arrayresultuserlikematches = iterator_to_array($resultuserlikematches, false);
		
	}
	}
	
	var_dump($arrayresultuserlikematches);
	//echo $arrayUserLikes;
	//echo $arrayUserLikes['_id']->{id} . '<br />';

		
	//$cursorLikes = $collectionUserLikes->find(array('$in'), array('id_like' => $like['id_like']));
		
//	var_dump($arrayUserLikes);
//	$cursoraffinitylikes = $collectionUserLikes->find('$in' => $array['lib'] => )                 //Likes en commun avec autres
	
	//}
	
	
	
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
	