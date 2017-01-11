<?php
require('../mongodb/database.php');

if(isset($_GET['sujet'])){
$sujet = htmlspecialchars($_GET['sujet']);	
	$arraylist = explode(",", $sujet);
	if(isset($arraylist[1])){
	$sujets = array('libelle' => $arraylist[0], 'id_cat' => $arraylist[1]);   
	}else{
		echo 'error';
	}
	if(isset($arraylist[2])){
	$sujets = array('libelle' => $arraylist[0], 'id_cat' => $arraylist[1], 'id_souscat' => $arraylist[2]);   
	}else{
		echo 'error';
	}
	if(isset($arraylist[3])){
	$sujets = array('libelle' => $arraylist[0], 'id_cat' => $arraylist[1], 'id_souscat' => $arraylist[2], 'id_souscat2' => $arraylist[3]);   
	}else{
		echo 'error';
	}
   if(isset($arraylist[4])){
	$sujets = array('libelle' => $arraylist[0], 'id_cat' => $arraylist[1], 'id_souscat' => $arraylist[2], 'id_souscat2' => $arraylist[3], 'id_souscat3' => $arraylist[3]);   
	}else{
		echo 'error';
	}
		
   $collectionSujet->insert($sujets);
   $ID = $libsujet['_id'];
	echo $ID;
}

?>