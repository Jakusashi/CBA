<?php session_start();
    require_once('db2.php');
?>

<html>
	<head>
        <link rel="Stylesheet" type="text/css" href="styl.css" />
		<?php
            if(check_login()) {
            } else {
                header('Location: login.php');
                exit;
            }
            
            function check_login () {
                if(isset($_SESSION['user']) && $_SESSION['user'] != '') {
                   return true;
                } else {
                   false;
                }
            }
        ?>
		
		<title> Pokemon Managment </title>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		
		<style>			
			#zakladka1 {
				border-top-left-radius: 5px;
				border-top-right-radius: 5px;
				text-align: center;
				background-color: b3ecff;
				font-family: arial;
				font-size: 20px;
				width: 10%;
				height: 6%;
				display: table-cell;
			}
			
			#zakladka2 {
				border-top-left-radius: 5px;
				border-top-right-radius: 5px;
				text-align: center;
				background-color: b3ecff;
				font-family: arial;
				font-size: 20px;
				width: 10%;
				height: 6%;
				display: table-cell;
			}
			
			#zakladka3 {
				border-top-left-radius: 5px;
				border-top-right-radius: 5px;
				text-align: center;
				background-color: b3ecff;
				font-family: arial;
				font-size: 20px;
				width: 10%;
				height: 6%;
				display: table-cell;
			}
			
			#zakladka4 {
				border-top-left-radius: 5px;
				border-top-right-radius: 5px;
				text-align: center;
				background-color: #33ccff;
				font-family: arial;
				font-size: 20px;
				width: 10%;
				height: 6%;
				display: table-cell;
			}
			
			#zakladka1:hover {
				background-color: #33ccff;
				color: white;
			}
			
			#zakladka2:hover {
				background-color: #33ccff;
				color: white;
			}
			
			#zakladka3:hover {
				background-color: #33ccff;
				color: white;
			}
            
		</style>
	</head>
	
	<body>
		<center>
			<a href="main.php"><img src="Pokemon_logo.png" /></a>
        </center> 
		
		<div id='all'>
			<div id='zakladka1'> <a href="main.php"> Home </a> </div>
			<div id='zakladka2'> <a href="lista_pkmn.php"> Pokedex </a> </div>
			<div id='zakladka3'> <a href="shoutbox.php"> Shoutbox </a> </div>
			<div id='zakladka4'> <a href="managment.php"> Managment </a> </div>
			
			<div id='body'> 
				<div id='mana'>
                <center>
					<?php
					require_once('db.php');

					$zapytanie = "SELECT id_pokemon, name, type.type AS type1, type2.type AS type2, gotcha FROM `lista` INNER JOIN type ON lista.type1=type.id_type INNER JOIN type2 ON lista.type2=type2.id_type ORDER BY `id_pokemon`";
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
									  <td>".$r['type1']."</td> 
									  <td>".$r['type2']."</td>";

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
                </center>
				</div>
			</div>
			<div id='pkmnoftheday'> 
				<?php
					require_once('db.php');
					
					srand(floor(time() / (60*60*24)));
					$losowanie = rand(1,802);
					
					echo "<h1> Pokemon of the day! </h1> <br />"; 
					
					echo "<img src=\"http://serebii.net/art/th/".$losowanie.".png\"> <br />";
					
					$zapytan = "SELECT name FROM `lista` WHERE id_pokemon = ".$losowanie."";
					$klery = mysql_query($zapytan)
								or die('Whoops.... something went wrong');
								
					while ($rows = mysql_fetch_array($klery)){            
						$name = $rows['name'];           
					
						echo "<font size='4' face='calibri'> It's ".$name." </font>";
					}
				?>	
			</div>
			<div id='stopa'> By Jakusashi <br /> 2017 </div>
		</div>
	</body>
</html>