<html>
	<head>
		<title> Add list </title>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<link rel="Stylesheet" type="text/css" href="style.css" />
	</head>
	
		<body>

		<center>
			<a href="main.php"><img src="Pokemon_logo.png" /></a>
		<p>
		
		<form method="post">
		<div id="menu">
		<font face="arial" size="4"> <b>
			ID:
			<input type="number" name="id_pokemon" />
			<br />
			Name:
			<input type="text" name="name" />
			<br />
			Type 1:
			<select name="type1">
				<option>grass</option>
				<option>fire</option>
				<option>water</option>
				<option>ice</option>
				<option>dragon</option>
				<option>electric</option>
				<option>dark</option>
				<option>bug</option>
				<option>fight</option>
				<option>fairy</option>
				<option>ground</option>
				<option>rock</option>
				<option>ghost</option>
				<option>normal</option>
				<option>poison</option>
				<option>psychic</option>
				<option>flying</option>
				<option>steel</option>
			</select>
			<br />
			Type 2:
			<select name="type2">
				<option>grass</option>
				<option>fire</option>
				<option>water</option>
				<option>ice</option>
				<option>dragon</option>
				<option>electric</option>
				<option>dark</option>
				<option>bug</option>
				<option>fight</option>
				<option>fairy</option>
				<option>ground</option>
				<option>rock</option>
				<option>ghost</option>
				<option>normal</option>
				<option>poison</option>
				<option>psychic</option>
				<option>flying</option>
				<option>steel</option>
				<option>-----</option>
			</select>
			<br />
			Gotcha?
			<input type="checkbox" name="gotcha" value="T" />
			</div>
			<div id="lewa_kolumna">
			<input type="image" id="button" src="add.png" />
			</div>
		</form>	
			
		</center>
		
		<?php
		
			include('db.php');
			
			if(isset($_POST['id_pokemon']) && isset($_POST['name']) && isset($_POST['type1']) && isset($_POST['type2']))
			{
				$id_pokemon= $_POST['id_pokemon'];
				$name=$_POST['name'];
				$type1=$_POST['type1'];
				$type2=$_POST['type2'];
				
				if(empty($_POST['gotcha']))
				{
				$gotcha = 'N';
				}
				else
					$gotcha=$_POST['gotcha'];
				//echo $gotcha;
				
		
				if(!empty($id_pokemon) && !empty($name) && !empty($type1) && $id_pokemon!='' && $name!='' && $type1!='' && $id_pokemon<722)
				{		
					$zapytanie = "INSERT INTO `lista` VALUES ('$id_pokemon','$name','$type1','$type2','$gotcha')";
					//echo $zapytanie;
					$wykonanie_zapytania = mysql_query($zapytanie);
			
					echo "<center> <b> Jobs done </b>";
					
				}else{
						echo "<center> <b> Error </b>";
					}
			}			
		?>
	</body>
</html>