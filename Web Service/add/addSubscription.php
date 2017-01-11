<?php

require('../mongodb/database.php');
require('../verifs/verifs.php');

if(isset($_GET['subscribe'])){
$inscription = htmlspecialchars($_GET['subscribe']);
	$arraylist = explode(",", $inscription);
	var_dump($arraylist);
	
	$prenom = verifPrenom($arraylist[0]);
	$password = $arraylist[1];
	$email = verifMail($arraylist[2]);
	$langue = verifLangue($arraylist[3]);
	$sexe = verifSexe($arraylist[4]);
	$birth = verifBirth($arraylist[5]);
	$longitude = verifLong($arraylist[6]);
	$latitude = verifLat($arraylist[7]);
   	
if($prenom != "false" && $password != "false"&& $email != "false"&& $langue != "false"&& $sexe != "false"&& $birth != "false"&& $longitude != "false"&& $latitude!= "false"){
	
   
	
   $infos = array( 
      "prenom" => $prenom,
      "password" => $password, 
	  "email" => $email,
      "langue" => $langue,
      "sexe" => $sexe,
      "birth" => $birth,
	  "date_inscription" => new MongoDate(),
	  "id_device" => "Android",
	  "date_last_connection" => new MongoDate(),
	  "coordonnees" => array("longitude" => $longitude, "latitude" => $latitude),
	  "sujet" => array(),
	  "reponses" => array(),
	  "like" => array(),
	  "messages_prives" => array(),
	  "like_reponse" => array());
	
   
   
   $collectionUsers->insert($infos);
   $ID = $infos['_id'];
   
	echo $ID;
	
   $cursor = $collectionUsers->find();
   // iterate cursor to display title of documents
	
   foreach ($cursor as $document) {
      echo $document["prenom"] . "\n";
   }

    // Fermeture de la connexion
    $mongo->close();
	}
}
