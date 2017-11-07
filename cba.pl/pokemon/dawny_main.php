<?php session_start();
    require_once('db2.php');
?>

<html>
    <head>
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
		<link rel="Stylesheet" type="text/css" href="style.css" />
	</head>
	
	<body>
        <center>
		
			<a href="main.php"><img src="Pokemon_logo.png" /></a>
        </center>    
		<p>
		
		<div id="mainmenu">
			<a href="lista_pkmn.php"><img src="Pokedex.png" width='90%' height='50%' /></a> <br />
		
			<a href="managment.php"><img src="settings.png" width='90%' height='90%' /></a> <br />
	
			<a href="dodawanie_pokuf.php"><img src="add.png" width='90%' height='90%' /> </a> <br />
            
            <a href="shoutbox.php"> <img src="shout.png" width='90%' height='90%' /> </a>
		</div>
    
        
        <div id="maintresc">
        <center>
            <font size='5' face='Arial'>
            <?php
                require_once('db.php');
                
                //echo "<div id='rameczka'>";
                echo "<p>";
                echo "<a href='<error.php'> <img src='avatary/avk.jpg' width='150px' height='150px'> </a> <br />";
            	echo "Witaj $_SESSION[user] !";
                //echo "</div>";
                
                echo "<br />";
                
                echo "<a href='logout.php'>";
    		    	echo "<input type='button' value='Wyloguj'>";
			    echo "</a>";
                
                echo "<br />";
                
                echo "<table>";
                    echo "<tr>";
                        echo "<td> <img src='addnew.png'> </td> <td> <img src='addnew.png'> </td> <td> <img src='addnew.png'> </td> <td> <img src='addnew.png'> </td> <td> <img src='addnew.png'> </td> <td> <img src='addnew.png'> </td>";
                    echo "</tr>";
                echo "</table>";
                
              echo "</div>";
                
              echo "<div id='maindaily'>";
               
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
            </font>
            <br />
        </div>
        <div id='footer'>
           <font size='5' face='Calibri'> By Jakusashi <br /> <i> 2016 - Jakusashi CORP </i> </font>
        </div>
	</body>
</html>		