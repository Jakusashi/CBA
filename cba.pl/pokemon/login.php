<?php session_start();
	require_once('db.php');
?>

<html>
	<head>
		<title> Logowanie </title>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<link rel="Stylesheet" type="text/css" href="style.css" />
	</head>
	
	<body>

		<center>
			<img src="Pokemon_logo.png" />
		<p>
		
		<font face="Arial" size="5">
			<br /> <b> Zaloguj sie </b> </font>
			<br />
			
			
		<?php
			if (!isset($_POST['nick']) && !isset($_POST['pass']) && $_SESSION['auth'] == FALSE) {
		?>
				<form name="form-logowanie" method="post">
					<b> Nickname: <input name="nick" type="text"> <br />
					<b> Haslo: <input name="pass" type="password"> <br />
					<input name="zaloguj" value="Zaloguj" type="submit">			
				</form>
			</div>
			<br /> Nie masz jeszcze konta? <a href="singin.php"> Zarejestruj sie! </a>
		</center>

		<?php
			}
			elseif (isset($_POST['nick']) && isset($_POST['pass']) && $_SESSION['auth'] == FALSE) {
				if (!empty($_POST['nick']) && !empty($_POST['pass'])) {
					$nick = mysql_real_escape_string($_POST['nick']);
					$pass = mysql_real_escape_string($_POST['pass']);

					$sql = mysql_num_rows(mysql_query("SELECT * FROM `user` WHERE `nick` = '$nick' AND `pass` = '$pass'"));
					if ($sql == 1) {
						$_SESSION['user'] = $nick;
						$_SESSION['auth'] = TRUE;
						echo '<meta http-equiv="refresh" content="1; URL=logowanie.php">';
						echo '<p style="padding-top:10px;"><strong>Prosze czekac...</strong><br>trwa logowanie<p></p>';
					}					
				    else {
						echo '<p style="padding-top:10px;color:red" ;="">Wystapil nieoczekiwany blad podczas logowania<br>';
						echo '<a href="login.php" style="">Wroc do formularza</a></p>';
					}
				}	
				else {
					echo '<p style="padding-top:10px;color:red" ;="">Niektore dane nie zosta³y wypelnione<br>';
					echo '<a href="login.php" style="">Wroc do formularza</a></p>';    
				}
			}
			
			elseif ($_SESSION['auth'] == TRUE && !isset($_GET['logout'])) {
				echo '<meta http-equiv="refresh" content="1; URL=trwa_wylogowanie.php">';
				echo '<p style="padding-top:10px;"><strong>Proszê czekaæ...</strong><br>trwa wczytywanie danych<p></p>';
			}
			elseif ($_SESSION['auth'] == TRUE && isset($_GET['logout'])) {
				$_SESSION['user'] = '';
				$_SESSION['auth'] = FALSE;
				echo '<meta http-equiv="refresh" content="1; URL=login.php">';
				echo '<p style="padding-top:10px;"><strong>Proszê czekaæ...</strong><br>trwa wylogowywanie<p></p>';
			}
		?>
	</body>
</html>	