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
<a class="home" href="getMembres.php">Membres</a>
</li>
<li class ="menuhaut">
<a class="workexperience" href="getCategories.php">Catégories</a>
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
    CURLOPT_URL => 'http://localhost/Web%20Service/get/getMembres.php',
   )
);
// Send the request & save response to $resp
$resp = curl_exec($curl);


// Close request to clear up some resources
$response = json_decode($resp, true);
//var_dump($response);

foreach ($response as $document) {

	
?>

 <table>
 <thead>
 <tr>
 <th>Id</th>
 <th>Prénom</th>
 <th>E-mail</th>
 <th>Langue</th>
 <th>Sexe</th>
 <th>Date de naissance</th>
 <th>Date d'nscription</th>
 <th>Date dernière connexion</th>
 <th>Longitude</th>
 <th>Latitude</th>
 </tr>
 </thead>
 <tbody>    
<td><?= $document['_id']["\$id"]; ?></td>
<td><?= $document['prenom']; ?></td>
<td><?= $document['email']; ?></td>
<td><?= $document['langue']; ?></td>
<td><?= $document['sexe']; ?></td>
<td><?= $document['birth']; ?></td>
<td><?= date('d-m-Y h:i:s', $document['date_inscription']['sec']); ?></td>
<td><?= date('d-m-Y h:i:s', $document['last_connexion']['sec']); ?></td>
<td><?= $document['latitude']; ?></td>
<td><?= $document['longitude']; ?></td>
<br />
</tbody>
</table>
  
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
       $('.)
       $(".titre").fadeIn(2000);
    $(".contenutext").fadeIn(3000);
        
        $(".soustitre").fadeIn(2000);  
       
                 
            });
    </script>
       
</html> 

