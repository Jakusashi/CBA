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
		
		<title> Shoutbox </title>
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
				background-color: #33ccff;
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
			
			#zakladka1:hover {
				background-color: #33ccff;
				color: white;
			}
			
			#zakladka2:hover {
				background-color: #33ccff;
				color: white;
			}
			
			#zakladka4:hover {
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
				<div id='shoutbox'>
				<?php
					require_once('db2.php');
					
					$zapytanie = "SELECT * FROM `shoutbox` ORDER BY `date` DESC LIMIT 0,20";
					mysql_query("SET NAMES 'latin2'");
					$result = mysql_query($zapytanie) 
						or die('Blad zapytania');
					
					$num=mysql_numrows($result);

					mysql_close();
					
					
					
					$i=0;
					while ($i < $num) {
			
						$autor=mysql_result($result,$i,"autor");
						$date=mysql_result($result,$i,"date");
						$tresc=mysql_result($result,$i,"tresc");

						echo "<div id='sgdhout'>";
							echo "<div id='shout'> <div id='dane'> <img src='avatary/avk.jpg' width='60px' height='60px'> <font face='arial' size='3'> <b> $autor </b> <br /> <font face='arial'> $date </font> </div> <div id='koment>' <b>  <font face='arial'> $tresc </b> </font> </div> </div>";
						echo "</div>";
						$i++;
					}  
				?>
				</div>
				<br />
				<form method="post">
					
				<textarea maxlength="500" id='tekst' name='tekst'></textarea>
					<br />
					
					<input type="submit" value="Wyslij" />
				</form>
				
				<?php
					header('Content-Type: text/html; charset=utf8mb4_unicode_ci');
					include('db.php');
					
					mysql_query("SET NAMES 'latin2'");
					
					$data = date("Y-m-d H:i:s");
					$tekst=$_POST['tekst'];
					
					//if(isset ($_POST['data']) && isset($_POST['tekst']))
					//{
						
						if(strpos($tekst, "<") === false){
							if($tekst!=""){
								$zapytanie = "INSERT INTO `shoutbox` (`id_shoutbox`, `autor`, `date`, `tresc`, `id_user`) VALUES ('','$_SESSION[user]','$data','$tekst','')";
								$wykonanie_zapytania = mysql_query($zapytanie);
								
								$tekst[0].reset();
								
								echo "<meta http-equiv='Refresh' content='0; url=shoutbox.php' />";
								
								$tekst[0].reset();
							}else{
								echo "Chyba niektore pola nie zostaly wypelnione";
							}
						}else{
							$tekst = str_replace("<","#",$tekst);
							echo $tekst;
							$zapytanie2 = "INSERT INTO `shoutbox` (`id_shoutbox`, `autor`, `date`, `tresc`, `id_user`) VALUES ('','$_SESSION[user]','$data','$tekst','')";
							$wykonanie_zapytania2 = mysql_query($zapytanie2);
							
							$tekst[0].reset();
							
							echo "<meta http-equiv='Refresh' content='0; url=shoutbox.php' />";
							
							$tekst[0].reset();
						}    
					//}
				?>
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