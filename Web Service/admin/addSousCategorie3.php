<?php
require('../mongodb/database.php');

if(isset($_GET['categorie'])){
	
$categorie = htmlspecialchars($_GET['categorie']);
		$arraylist = explode(",", $categorie);
	$libcat = array('libelle' => $arraylist[0], 'id_cat' => $arraylist[1], 'id_souscat' => $arraylist[2], 'id_souscat2' => $arraylist[3]);   
    $collectionSousCategories3->insert($libcat);
    $ID = $libcat['_id'];
	echo $ID;
}

?>