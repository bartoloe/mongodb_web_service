<?php

require('../mongodb/database.php');
		if(isset($_GET['categorie'])){
		$cat = htmlentities($_GET['categorie']);
		
		$values = array('lib_cat' => $cat, 'date' => new MongoDate(), 'likes' => array());
		$collectionCategories->insert($values);
	 $mongo->close();
	
	}
	
