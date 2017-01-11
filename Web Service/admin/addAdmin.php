<?php

require('../mongodb/database.php');
require('../verifs/verifs.php');

	
	$categoriesandlikes = array(
	"categorie" => array()
	);
	
      
   $collectionUsers->insert($categoriesandlikes);
   $ID = $categoriesandlikes['_id'];
   
	echo $ID;
	

    // Fermeture de la connexion
    $mongo->close();
	
