<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1.0">

        <meta charset="utf-8" />
        <title>Application sans nom</title>
<link rel="stylesheet" type="text/css" href="//fonts.googleapis.com/css?family=Open+Sans" />
 <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Portfolio de Emmanuel BARTOLOMEI</title>
<link rel="stylesheet" type="text/css" href="style.css"/>
<script src="jquery.js"></script>
<script src="flowtype.js"></script>
</head>
   <body>
    
    <div class="header">
    
    
      <div class="logotitre">
    </div>
<div class="menu">
<ul class="ulhaut">
    
<li class ="menuhaut">
<a class="home" href="#">Add</a>
</li>
<li class ="menuhaut">
<a class="workexperience" href="#">Update</a>
</li>
<li class ="menuhaut">
<a class="aboutme" href="#">Delete</a>
</li>
<li class="menuhaut">
    <a class="aboutme" href="#">Admin</a>
    </li>
    
        </ul>

  </div>
    </div>
    
    <div class="container">
        <div class="topcontainer">
            <div class="logoaccueil"></div><div class="titre">Accueil</div>
            <div style="display: none;" class="soustitre">Page de présentation</div>
        </div>
        <div class="rightmenu">
        <ul class="menurightul">
            <li class="menurightli">
            <a class="menurighta" href="#">Show Users</a>
            </li>
            <li class="menurightli">
            <a class="menurighta" href="#">Show Categories</a>
            </li>
            <li class="menurightli">
            <a class="menurighta" href="#">Show Likes</a>
            </li>
            <li class="menurightli">
            <a class="menurighta" href="#">Show Sujets</a>
            </li>
            <li class="menurightli">
            <a class="menurighta" href="#">Show Users with x like in commun</a>
            </li>
            <li class="menurightli">
            <a class="menurighta" href="#">Show Users near you</a>
            </li>
            </ul>
        </div>
        <div class="textcontainer">
<p style="display: none;" class="contenutext">
<?php
if (isset($_GET['emailuser'])){
	$email = htmlspecialchars($_GET['emailuser']); 

}
$curl = curl_init();
// Set some options - we are passing in a useragent too here

curl_setopt_array($curl, array(
    CURLOPT_RETURNTRANSFER => 1,
    CURLOPT_URL => 'http://localhost/Web%20Service/get/getMembres.php?email='. $email,
   )
);
// Send the request & save response to $resp
$resp = curl_exec($curl);


// Close request to clear up some resources
$response = json_decode($resp, true);
//var_dump($response);

foreach ($response as $document) {

	
?>
<div class="contenuform">

 <table>
 <tr>        
<form id="addUser" method="post">

<td><label for="_id" class="contenutext"><?= $document['prenom'] ?>: </label></td>
<td><input type="text" id="_id" value="<?= $document['_id']["\$id"]; ?>"><br /><br /></td>
</tr>
<?php

curl_close($curl);
foreach ($response as $document) {
	foreach($document['like'] as $like){
		
$curl = curl_init();
// Set some options - we are passing in a useragent too here

curl_setopt_array($curl, array(
    CURLOPT_RETURNTRANSFER => 1,
    CURLOPT_URL => 'http://localhost/Web%20Service/get/getLikes.php?like='. $like["\$id"]
   )
);
// Send the request & save response to $resp
$resp = curl_exec($curl);


// Close request to clear up some resources
$response = json_decode($resp, true);
var_dump($response);

		
	//var_dump($sujet);
?>
<tr>
<td><label for="<?= $like["\$id"]; ?>" class="contenutext">Id Like : </label></td>
<td><input type="text" id="<?= $like["\$id"]; ?>" value="<?= $like["\$id"]; ?>"><br /><br /></td> 
</tr>
<?php
}
}
curl_close($curl);
?>
<tr>
<td>
<input type="submit" value="Modifier">
</td>
</tr>
</table>
</div>
</form>
  
<?php
}

?>
</p>

  </div>
       </div>

    <div class="footer">
        <span class="copyleftimage"></span><p class="copyleft">Site web réalisé en HTML, CSS et JQuery</p>
        
    </div>
    
</body>
    <script>
   $(function() {
       
       $(".titre").fadeIn(2000);
    $(".contenutext").fadeIn(3000);
        
        $(".soustitre").fadeIn(2000);  
       
                 
            });
    </script>
       
</html> 

