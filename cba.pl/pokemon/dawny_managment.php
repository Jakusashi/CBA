<html lang="pl">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<title>Managment</title>
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
	<link rel="Stylesheet" type="text/css" href="style.css" />
	<link rel="Stylesheet" type="text/css" href="css/fontello.css" />
</head>
<body>
<center>
	<a href="main.php"><img src="Pokemon_logo.png" /></a>
<font size="3" face="arial">
<?php
require_once('db.php');

$zapytanie = "SELECT id_pokemon, name, type.type, type2.type, gotcha FROM `lista` INNER JOIN type ON lista.type1=type.id_type INNER JOIN type2 ON lista.type2=type2.id_type ORDER BY `id_pokemon`";
$wynik_zapytania = mysql_query($zapytanie) 
	or die('Error'); 
	


if(mysql_num_rows($wynik_zapytania) > 0)
{  
	echo "<table cellpadding=\"2\" border=\"1\">
		<tr>
			<td> <b> ID </b> </td>
			<td> <b> Name </b> </td>
			<td> <b> Type 1 </b> </td>
			<td> <b> Type 2 </b> </td>
			<td> <b> Gotcha </b> </td>
			<td> <b> Edit </b> </td>
		</tr>"; 
	
	while($r = mysql_fetch_assoc($wynik_zapytania)) 
	{ 
		echo "<tr>
				  <td>".$r['id_pokemon']."</td>
				  <td>".$r['name']."</td>
				  <td>".$r['type.type']."</td> 
				  <td>".$r['type']."</td>";

				if($r['gotcha'] == 'T')
					echo "<td><i class=\"demo-icon icon-ok\"></i></td>";
				else
					echo "<td><i class=\"demo-icon icon-cancel\"></i></td>";				  
				echo "<td> <a href='edit.php?id_pokemon=".$r['id_pokemon']."&action=edit'>edit</a></td>
			  
			  
				
				</tr>";
	} 
	echo "</table>"; 
}

?>
</font>

	<a href="dodawanie_pokuf.php">
		<input type="button" value="Return">
	</a>
</center>
</body>
</html>