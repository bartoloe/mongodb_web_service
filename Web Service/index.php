<?php
   // connect to mongodb
   $mongo = new MongoClient();
	
   echo "Connection to database successfully";
   // select a database
   $db = $mongo->db;
	
   echo "Database mydb selected";
   
   $collection = $db->users;
   	
   $document = array( 
      "title" => "MongoDB", 
      "description" => "database", 
      "likes" => 100,
      "url" => "http://www.tutorialspoint.com/mongodb/",
      "by", "tutorials point"
   );
   
   
   $collection->insert($document);
   echo "Document inserted successfully";
	
	
   $cursor = $collection->find();
   // iterate cursor to display title of documents
	
   foreach ($cursor as $document) {
      echo $document["title"] . "\n";
   }

    // Fermeture de la connexion
    $mongo->close();
	
	$collection
?>