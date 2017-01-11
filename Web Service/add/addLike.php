<?php

require('../mongodb/database.php');
		
if(isset($_GET['categorie'])){
$categorie = htmlspecialchars($_GET['categorie']);
	
if(isset($_GET['like'])){
$like = htmlspecialchars($_GET['like']);
   	
$values = array('_idlike' => new MongoId, 'lib_like' => $like, 'date' => new MongoDate());
		
		
   
   $collectionCategories->update(array("lib_cat"=> $categorie), array('$push' => array('like' => new MongoId($like))));
  
}
}
	 $mongo->close();
	}
