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
		
		<title> Strona glowna </title>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		
		<style>	
            #body {
                text-align: center;
            }
            
			#zakladka1 {
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
				background-color: b3ecff;
				font-family: arial;
				font-size: 20px;
				width: 10%;
				height: 6%;
				display: table-cell;
			}
			
			#zakladka2:hover {
				background-color: #33ccff;
				color: white;
			}
			
			#zakladka3:hover {
				background-color: #33ccff;
				color: white;
			}
			
			#zakladka4:hover {
				background-color: #33ccff;
				color: white;
			}

            table {
                float: center;
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
				<?php
					require_once('db.php');
					
					//echo "<div id='rameczka'>";
					echo "<p>";
					echo "<a href='<error.php'> <img src='avatary/avk.jpg' width='150px' height='150px'> </a> <br /> ";
					echo "<font face='Arial' size='5'> $_SESSION[user] </font>";
					//echo "</div>";
					
					echo "<br />";
					
					echo "<a href='logout.php'>";
						echo "<input type='button' value='Wyloguj'>";
					echo "</a>";
					
					echo "<br /> <center>";
					
					echo "<table>";
						echo "<tr>";
							echo "<td> <img src='addnew.png' width='150px' height='150px'> </td> <td> <img src='addnew.png' width='150px' height='150px'> </td> <td> <img src='addnew.png' width='150px' height='150px'> </td> </tr> <tr> <td> <img src='addnew.png' width='150px' height='150px'> </td> <td> <img src='addnew.png' width='150px' height='150px'> </td> <td> <img src='addnew.png' width='150px' height='150px'> </td>";
						echo "</tr>";
					echo "</table> </center>";
				?>	
			</div>
			<div id='pkmnoftheday'> 
				<?php
					require_once('db.php');
					
					srand(floor(time() / (60*60*24)));
					$losowanie = rand(1,802);
					
					echo "<h1> Pokemon of the day! </h1> <br />"; 
					
					echo "<img src=\"http://serebii.net/art/th/".$losowanie.".png\"> <br />";
					
					$zapytanie = "SELECT name FROM `lista` WHERE id_pokemon = ".$losowanie."";
					$klery = mysql_query($zapytanie)
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