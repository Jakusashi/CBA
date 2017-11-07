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
		
		<title> Pokedex </title>
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
				background-color: #33ccff;
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
			
			#zakladka1:hover {
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
                <br />
				<form method="get">
				    <input type="text" name="search" id="search"> 
				    <input type="submit" value="Szukaj"> <br />
			    </form>	
				
    			<?php
    				$search=$_GET['search'];
    				
    				require_once('db.php');
                    
    				if(empty($search))
    				{
                        echo "<div id='calydex'>";
    					$zapytanie = "SELECT id_pokemon, name, type.type, type2.type, gotcha FROM `lista` INNER JOIN type ON lista.type1=type.id_type INNER JOIN type2 ON lista.type2=type2.id_type ORDER BY `id_pokemon`";
    					$result = mysql_query($zapytanie) 
    					or die('Blad zapytania');
    					
    					$num=mysql_numrows($result);
    
    					
					
    
    					$i=0;
    					while ($i < $num && $i < 803) {
    			
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
                            
    					}
                        echo "</div>";
                        
    				}else{
                            echo "<div id='calydex'>";
        					$zapytanie2 = "SELECT id_pokemon, name, type.type, type2.type, gotcha FROM `lista` INNER JOIN type ON lista.type1=type.id_type INNER JOIN type2 ON lista.type2=type2.id_type WHERE name LIKE '%".$search."%' OR type.type LIKE '%".$search."%' OR type2.type LIKE '%".$search."%' ORDER BY `id_pokemon`";
    						$result2 = mysql_query($zapytanie2)
    							or die('Error');
    							
    						$num=mysql_numrows($result2);
    
    						
    
    						$i=0;
    						while ($i < $num && $i < 803) {
    			
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
    					    }
                            echo "</div>";                          
    				}
                    
                    
    		
            echo "</div>";    
			echo "<div id='pkmnoftheday'>";
            
			        srand(floor(time() / (60*60*24)));
        			$losowanie = rand(1,802);
					
					echo "<h1> Pokemon of the day! </h1> <br />"; 
					
					echo "<img src=\"http://serebii.net/art/th/".$losowanie.".png\"> <br />";
					
                    $pytanko = "SELECT name FROM `lista` WHERE id_pokemon = ".$losowanie."";
    				$klery = mysql_query($pytanko)
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
