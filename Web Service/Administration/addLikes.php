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
		<?php
$curl = curl_init();
// Set some options - we are passing in a useragent too here

curl_setopt_array($curl, array(
    CURLOPT_RETURNTRANSFER => 1,
    CURLOPT_URL => 'http://localhost/Web%20Service/get/getCategories.php'
   )
);
// Send the request & save response to $resp
$resp = curl_exec($curl);


// Close request to clear up some resources
$response = json_decode($resp, true);
//var_dump($response);
foreach($response as $cat){
?>

<p class="contenutext">
<table id="tab">
 <thead>
    <tr>
      <th>Id Catégorie</th>
      <th>Libellé Catégorie</th>
      <th>Date création</th>
    </tr>
  </thead>
 <tbody id="tbod">
<tr>
<td><?= $cat['_id']["\$id"]; ?></td>
<td><?= $cat['lib_cat'] ?></td>
<td><?= date('d-m-Y h:i:s', $cat['date']['sec']); ?></td>
</tr>
</tbody>

</table>
</p>
<?php }
?>
<form action="../add/addLike.php" method="get">

<p class="contenutext">
<label for="Username" class="contenutext">Catégorie : <input type="text" name="categorie" /></label><br /><br />
<label for="Username" class="contenutext">Libellé Like : <input type="text" name="like" /></label><br /><br />
<input type="submit" value="Ajouter">

</p>
</form>

  </div>
       </div>

    <div class="footer">
        <span class="copyleftimage"></span><p class="copyleft">Site web réalisé en HTML, CSS et JQuery</p>
        
    </div>
    
</body>
    <script>
   $(function() {
          $.get('http://localhost/Web%20Service/get/getCategories.php', function(data) {
			var obj = jQuery.parseJSON(data);	
var table = $('<tbody></tbody>');
for(i=0; i<3; i++){
    var row = $('<td></td>').text('result ' + i);
    table.append(row);
}

$('#tbod').append(table);
			
			

			console.log(obj);
          });   	  
		  

       $(".titre").fadeIn(2000);
    $(".contenutext").fadeIn(3000);
        
        $(".soustitre").fadeIn(2000);  
       
                 
            });
    </script>
       
</html> 