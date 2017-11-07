<html>
	<head>
		<title> Team builder </title>
		<link rel="Stylesheet" type="text/css" href="style.css" />
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	</head>
	
	<body>
		<center>
			<a href="dodawanie_pokuf.php"><img src="Pokemon_logo.png" /></a>
		<p>
		<?php
		
		include('db.php');
		$zapytanie = "SELECT team.id_pokemon, lista.name FROM `team`,`lista` WHERE team.id_pokemon=lista.id_pokemon";
		$result = mysql_query($zapytanie)
		or die('B³¹d zapytania');
		
		$num=mysql_num_rows($result);
		
				if($num>0)
				while ($name=mysql_fetch_assoc($result)) {
					
					
					
					echo $name['name'];
					
				}
				
		$zapytanie = "SELECT team.id_pokemon, lista.name FROM `team`,`lista` WHERE team.id_pokemon=lista.id_pokemon";
		$result = mysql_query($zapytanie)
		or die('B³¹d zapytania');
		
		$num=mysql_num_rows($result);
		
				if($num>0)
				while ($name=mysql_fetch_assoc($result)) {
					
					
					
					echo $name['name'];
					
				}
		/*
		echo "Pokemon 1:
			<select name='name'>
				<option>".$name=mysql_fetch_assoc($result,$i,'name')."</option>
			</select>
		Pokemon 2:
			<select name='name'>
				<option>grass</option>
			</select>	
		Pokemon 3:
			<select name='name'>
				<option>grass</option>
			</select>
		Pokemon 4:
			<select name='name'>
				<option>grass</option>
			</select>
		Pokemon 5:
			<select name='name'>
				<option>grass</option>
			</select>
		Pokemon 6:
			<select name='name'>
				<option>grass</option>
			</select>";
				$i++;
				}	
				*/
		?>		
		</center>
	</body>
</html>