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
<td><label for="_id" class="contenutext">Id : </label></td>
<td><input type="text" id="_id" value="<?= $document['_id']["\$id"]; ?>"><br /><br /></td>
</tr>
<tr>
<td><label for="prenom" class="contenutext">Prénom : </label></td>
<td><input type="text" id="prenom" value="<?= $document['prenom']; ?>"><br /><br /></td>
</tr>
<tr>
<td><label for="prenom" class="contenutext">E-mail : </label></td>
<td><input type="text" id="email" value="<?= $document['email']; ?>"><br /><br /></td>
</tr>
<tr>
<td><label for="prenom" class="contenutext">Langue : </label></td>
<td><input type="text" id="langue" value="<?= $document['langue']; ?>"><br /><br /></td>
</tr>
<tr>
<td><label for="prenom" class="contenutext">Sexe : </label></td>
<td><input type="text" id="sexe" value="<?= $document['sexe']; ?>"><br /><br /></td>
</tr>
<tr>
<td><label for="prenom" class="contenutext">Date de naissance : </label></td>
<td><input type="text" id="birth" value="<?= $document['birth']; ?>"><br /><br /></td>
</tr>
<tr>
<td><label for="prenom" class="contenutext">Date d'inscription : </label></td>
<td><input type="text" id="dateinscription" value="<?= date('d-m-Y h:i:s', $document['date_inscription']['sec']); ?>"><br /><br /></td>
</tr>
<tr>
<td><label for="prenom" class="contenutext">Date dernière connexion : </label></td>
<td><input type="text" id="date_last_connection" value="<?= date('d-m-Y h:i:s', $document['last_connexion']['sec']); ?>"><br /><br /></td>
</tr>
<tr>
<td><label for="prenom" class="contenutext">Longitude : </label></td>
<td><input type="text" id="latitude" value="<?= $document['latitude']; ?>"><br /><br /></td>
</tr>
<tr>
<td><label for="prenom" class="contenutext">Latitude : </label></td>
<td><input type="text" id="longitude" value="<?= $document['longitude']; ?>"><br /><br /></td>
</tr>
<tr>
<td>
<input type="submit" value="Modifier">
</td>
</tr>
</table>
<a href="getMembreSujets.php?emailuser=<?= $email; ?>">Voir les sujets de <?= $document['prenom']; ?></a><br />
<a href="getMembreLikes.php?emailuser=<?= $email; ?>">Voir les likes de <?= $document['prenom']; ?></a><br />
</div>
</form>
  
<?php
}

curl_close($curl);
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

