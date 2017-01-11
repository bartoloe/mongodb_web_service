<?php
require('../mongodb/database.php');

if(isset($_GET['infos'])){
$infos = htmlspecialchars($_GET['infos']);
	$arraylist = explode(",", $infos);
	var_dump($arraylist);
	
	
	$id = $arraylist[0];
	$password = $arraylist[1];
	
		

  $cursor = $collectionUsers->findOne(array('_id' => new MongoId($id), 'password' => $password));
	var_dump($cursor);
	echo $cursor['langue'];

    $mongo->close();
	}
  /*
function verifContent($content){
	$content = htmlspecialchars($content);
	if(strlen($content) > 48){
		echo 'Message trop long';
	}
	
	echo 'Wrong Message \n';
	exit;
}
function verifDestinataire($destinataire){
	$destinataire = htmlspecialchars($destinataire);
	//check base Destinataire
	
	echo 'Wrong Destinataire id \n';
	exit;
}
function verifIdSujet($id_sujet){
	$id_sujet = htmlspecialchars($id_sujet);
	//check base id Sujet
	
	echo 'Wrong id sujet \n';
	exit;
	
}
*/

?>