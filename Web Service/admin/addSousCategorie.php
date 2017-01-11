<?php

require('../mongodb/database.php');
		if(isset($_GET['categories'])){
		$cat = htmlentities($_GET['categories']);
		$arraydest = explode(",", $cat);
		for($i = 0; $i<count($cat); $i++){
			$arraydest[$i] = new MongoId($arraydest[$i]);
		}
		
		$values = array('related_categories' => $arraydest, 'lib_cat' => $lib_categorie, 'date' => new MongoDate(), 'likes' => array());
		
		
		
	
   $collectionCategories->insert($values);
		}else{
			$values = array('lib_cat' => $lib_categorie, 'date' => new MongoDate(), 'likes' => array());
		$collectionCategories->insert($values);
		}
   
	
	
	}
	
