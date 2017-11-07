<?php session_start();
    require_once('db2.php');
?>

<html>
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
	<head>
		<title> Logowanie... </title>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<link rel="Stylesheet" type="text/css" href="style.css" />
	</head>
	
	<body>

		<center>
			<img src="Pokemon_logo.png" />
		<p>
		
		<?php
			if ($_SESSION['auth'] == TRUE && $_SESSION['user'] != 'Admin') 
			{
				echo 'Trwa logowanie...';
				echo '<meta http-equiv="Refresh" content="1; url=main.php" />';
			}
			else {
				echo '<meta http-equiv="refresh" content="1; URL=login.php">';
				echo '<p style="padding-top:10px;"><strong>Prónieautoryzowanego dostępu...</strong><br>trwa przenoszenie do formularza logowania<p></p>';
			}
		?>
	</body>
</html>	