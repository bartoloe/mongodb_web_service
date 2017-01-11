<?php

$messages = $_GET['messages'];
$json = json_decode($messages);

$id = verifId($json[0]);
$key = verifKey($json[1);
$content = getContent($json[2]);
$auteur = getAuteur($json[3]);
$id_sujet = verifIdSujet($json[4]);
$date = time();

function verifId($id){
	$id = htmlspecialchars($id);
	//check base id
	$exist = false;
	echo 'Wrong id \n';
	exit;
}
function verifKey($key){
	$key = htmlspecialchars($key);
	//check base key
	
	echo 'Wrong key \n';
	exit;
}
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



?>