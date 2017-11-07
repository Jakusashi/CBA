<?php session_start();
    require_once('db2.php');
?>

<html>
	<head>
		<title> Zmiana Avatara </title>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<link rel="Stylesheet" type="text/css" href="style.css" />
	</head>
	
	<body>
	<center>
			<a href="main.php"><img src="Pokemon_logo.png" /></a>
		<p>
            <font size='5' face='Comic Sans MS'>
            <?php
            	echo "$_SESSION[user] widzimy, ze planujesz zmienic swoj avatar. Funkcja ta jest obecnie nieodstepna. Nasi czolowi konsultanci pracuja by rozwiazac twoj problem <br />";
				echo "<img src='avatary/avk.jpg' width='350px' height='350px'>";
    		?>
            </font>
            <br />
        </div>
	</center>	
	</body>
</html>		