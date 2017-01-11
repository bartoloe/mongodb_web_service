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
	
	   function showLikes(id, it){
		    $.get('http://localhost/Web%20Service/get/getCategories.php?like='+id, function(data) {
			var obj = jQuery.parseJSON(data);	
var tbody = $('<tbody></tbody>');
var thead = $('<thead></thead>');

for(var c = 0; c<obj.length; c++){
	for(var d =0; d<obj[c].likes.length; d++){

var thead1 = $('<th></th>').text('Id Like');
var thead2 = $('<th></th>').text('Libellé Like');
var thead3 = $('<th></th>').text('Date création Like');
var thead4 = $('<th></th>').text('Actions');
		var row1 = $('<td></td>').text(obj[c].likes[d]._idlike.$id);
		var row2 = $('<td></td>').text(obj[c].likes[d].lib_like);
		var dater = new Date(obj[c].likes[d].date.sec*1000);
		var row3 = $('<td></td>').text(dater.getDate() + '-' + (dater.getMonth()+1) + '-' + dater.getFullYear());
		//var row4 = $('<td></td>').html(' <button onclick="myFunction()">Afficher likes</button> ');
	var tr1 = $('<tr></tr>');
	var tr2 = $('<tr></tr>');
	var tr3 = $('<tr></tr>');
	tr1.append(thead1);
	tr1.append(thead2);
	tr1.append(thead3);	
	//tr1.append(thead4);

$('#tbody'+c).append(tr1);
tr2.append(row1);
tr2.append(row2);
tr2.append(row3);
//tr2.append(row4);
	
$('#tbody'+c).append(tr2);

}
}
		   
		   
	   });
	   }
	
   $(function() {
	   
	   
          $.get('http://localhost/Web%20Service/get/getCategories.php', function(data) {
			var obj = jQuery.parseJSON(data);	


for(var c = 0; c<obj.length; c++){
var tbody = $('<tbody></tbody>');
var thead = $('<thead></thead>');
var thead1 = $('<th></th>').text('Id catégorie');
var thead2 = $('<th></th>').text('Libellé catégorie');
var thead3 = $('<th></th>').text('Date création catégorie');
var thead4 = $('<th></th>').text('Actions');
		var row1 = $('<td></td>').text(obj[c]._id.$id);
		var row2 = $('<td></td>').text(obj[c].lib_cat);
		var dater = new Date(obj[c].date.sec*1000);
		var row3 = $('<td></td>').text(dater.getDate() + '-' + (dater.getMonth()+1) + '-' + dater.getFullYear());
		var row4 = $('<td></td>').html(' <button id="btn'+c+'">Afficher likes</button> ');
	var tr1 = $('<tr></tr>');
	var tr2 = $('<tr></tr>').attr({id: "tbody"+c});
	tr1.append(thead1);
	tr1.append(thead2);
	tr1.append(thead3);	
	tr1.append(thead4);
$('#tab').append(tr1);
tr2.append(row1);
tr2.append(row2);
tr2.append(row3);
tr2.append(row4);
	
$('#tab').append(tr2);
var id = obj[c]._id.$id;

document.getElementById("btn"+c).addEventListener("click", function(){
  showLikes(this.id);
});
}


	
			
			

			console.log(obj);
          });   	  
		  

       $(".titre").fadeIn(2000);
    $(".contenutext").fadeIn(3000);
        
        $(".soustitre").fadeIn(2000);  
       
                 
            });
    </script>
       
</html> 