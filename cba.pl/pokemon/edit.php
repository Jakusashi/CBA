<!DOCTYPE HTML>
<html lang="pl">
<head>
	<meta charset="utf-8" />
	<title>Edit</title>
	<link rel="Stylesheet" type="text/css" href="style.css" />
	<link rel="Stylesheet" type="text/css" href="css/fontello.css" />
</head>
<body>
<center>
			<a href="main.php"><img src="Pokemon_logo.png" /></a>
		<p>
		
		<font size="3" face="arial">
<?php 
require_once('db.php');

$action = $_REQUEST['action']; 
$id_pokemon = $_GET['id_pokemon']; 

if($action == 'edit') 
{ 
    $wynik = mysql_query("SELECT * FROM `lista` GROUP BY `id_pokemon`") 
    or die('Error'); 

	if(mysql_num_rows($wynik) > 0) 
	{ 
		$r = mysql_fetch_assoc($wynik); 
		echo '<font size="3" type="arial"> <b> Edit: </b> </font> <br/>';
		echo '
		<form method="post"> 
			<input type="hidden" name="action" value="save" />
			<input type="hidden" name="id_pokemon" value="'.$id_pokemon.'" /> 
			gotcha: <input type="checkbox" name="gotcha" value="'.$r['gotcha'].'" /><br />
			<input type="submit" value="Save" /> 
		</form>'; 
	}  
} 
else if($action == 'save') 
{ 
	$gotcha = trim($_POST['gotcha']);

	if(empty($_POST['gotcha']))
		{
	$gotcha = 'N';
		}
	else
		$gotcha= 'T';
				
	$zapytanie = "UPDATE `lista` SET `gotcha`='$gotcha' WHERE`id_pokemon`='$id_pokemon'";
    echo $zapytanie;
	$query = mysql_query($zapytanie)
				or die('Errorowo'); 
				
	
	if($query)
	{
		echo 'Jobs Done'; 
	}
}
?> 
</font>
	<br />
	<a href="managment.php">
		<input type="button" value="Return">
	</a>
</center>	
</body>
</html>