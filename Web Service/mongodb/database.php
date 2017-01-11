<?php

$mongo = new MongoClient();
	
$db = $mongo->db;

$collectionUsers = $db->Users;

$collectionSousCategories = $db->souscategories;
$collectionCategories = $db->categories;

/*
$collectionMessages = $db->messages;
$collectionSujets = $db->sujets;
$collectionCategories = $db->categories;
$collectionSousCategories = $db->souscategories;
$collectionSousCategories2 = $db->souscategories2;
$collectionSousCategories3 = $db->souscategories3;
$collectionContacts = $db->contacts;
$collectionMessagesPrives = $db->messagesprives;
$collectionLikes = $db->likes;
$collectionUserLikes = $db->userlikes;
*/
?>