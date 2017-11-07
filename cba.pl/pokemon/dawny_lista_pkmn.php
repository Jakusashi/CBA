<html>
	<head>
		<title> Pokedex </title>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<link rel="Stylesheet" type="text/css" href="style.css" />
		<link rel="Stylesheet" type="text/css" href="css/fontello.css" />
	</head>

		<body>

	
		<center>
			<a href="main.php"><img src="Pokemon_logo.png" /></a>
			<p>
			
			<form method="get">
				<input type="text" name="search" id="search"> <br />
				<input type="submit" value="Szukaj"> <br />
			</form>	
				
			<?php
				$search=$_GET['search'];
				
				require_once('db.php');
				if(empty($search))
				{
					$zapytanie = "SELECT id_pokemon, name, type.type, type2.type, gotcha FROM `lista` INNER JOIN type ON lista.type1=type.id_type INNER JOIN type2 ON lista.type2=type2.id_type ORDER BY `id_pokemon`";
					$result = mysql_query($zapytanie) 
					or die('Blad zapytania');
					
					$num=mysql_numrows($result);

					mysql_close();
                    
                    echo "<div id='calydex'>";

					$i=0;
					while ($i < $num) {
			
						$id_pokemon=mysql_result($result,$i,"id_pokemon");
						$name=mysql_result($result,$i,"name");
						$type1=mysql_result($result,$i,"type.type");
						$type2=mysql_result($result,$i,"type2.type");
						$gotcha=mysql_result($result,$i,"gotcha");

						echo "<div id='news'>";
							echo "<font face='arial' size='3'> <b> $id_pokemon </b> </font> <br /> <b> <font face='arial' size='5'> <div id='title'> $name </font> </b> </div> <p> <font face='arial'> <b> Type 1: </b> </font> $type1<br> <font face='arial'> <b> Type 2: </b> </font> $type2 <br /> <font face='arial'>";
							echo "<b> Gotcha? </b>";
							if($gotcha == 'T')
								echo "<i class=\"demo-icon icon-ok\"></i>";
							else
								echo "<i class=\"demo-icon icon-cancel\"></i>";		
							echo "</font> <p>";
							echo "<img src=\"http://serebii.net/art/th/".$id_pokemon.".png\"> </div>";

						$i++;
                        
                        echo "</div>";
						}
					}else{
						$zapytanie2 = "SELECT id_pokemon, name, type.type, type2.type, gotcha FROM `lista` INNER JOIN type ON lista.type1=type.id_type INNER JOIN type2 ON lista.type2=type2.id_type WHERE name LIKE '%".$search."%' OR type.type LIKE '%".$search."%' OR type2.type LIKE '%".$search."%' ORDER BY `id_pokemon`";
						$result2 = mysql_query($zapytanie2)
							or die('Error');
							
						$num=mysql_numrows($result2);

						mysql_close();
                        
                        echo "<div id='calydex'>";

						$i=0;
						while ($i < $num) {
			
							$id_pokemon=mysql_result($result2,$i,"id_pokemon");
							$name=mysql_result($result2,$i,"name");
							$type1=mysql_result($result2,$i,"type.type");
							$type2=mysql_result($result2,$i,"type2.type");
							$gotcha=mysql_result($result2,$i,"gotcha");

							echo "<div id='news'>";
								echo "<font face='arial' size='3'> <b> $id_pokemon </b> </font> <br /> <b> <font face='arial' size='5'> <div id='title'> $name </font> </b> </div> <p> <font face='arial'> <b> Type 1: </b> </font> $type1<br> <font face='arial'> <b> Type 2: </b> </font> $type2 <br /> <font face='arial'>";
								echo "<b> Gotcha? </b>";
								if($gotcha == 'T')
									echo "<i class=\"demo-icon icon-ok\"></i>";
								else
									echo "<i class=\"demo-icon icon-cancel\"></i>";		
								echo "</font> <p>";
								echo "<img src=\"http://serebii.net/art/th/".$id_pokemon.".png\"> </div>";

							$i++;
                            
                        echo "</div>";
					    }    
				}
			?>	
			<br />
			<div id="stopa">
			<form method="get" action="main.php">
				<button type="submit">Return</button>
			</form>
			</div>
		</center>
	</body>
</html>