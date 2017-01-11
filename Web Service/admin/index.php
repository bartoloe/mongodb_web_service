<html>
<head>
<script src="//code.jquery.com/jquery-migrate-1.2.1.min.js">
</script>
</head>
<body>
<?php
$addUser = isset($_GET['addUser']) ? htmlspecialchars($_GET['addUser']) : 'empty';
?>
<script>
$(document).ready(function(){
    $('body')
        .append('<form id="myRequest"></form>'); //append a new form element with id mySearch to <body>
    $('#myRequest') 
        .attr("action","") .attr("method","post") //set the form attributes
        //add in all the needed input elements
        .append('<input type="text" name="id" value="id">')
        .append('<input type="password" name="password"  value="password">')
        .append('<input type="text" name="id_like"  value="id_like">')
});
</script>
<form id="myRequest" action="">
<input type="text" name="username">
<input type="text" name="password">
</form>
<?php
if($addUser){
	?>
	<input type="text" name="label">
<?php	
}
?>
<input type ="submit" value="Submit">

</form>
</body>
</html>