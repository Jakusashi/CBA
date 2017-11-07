<html>
	<head>
		<title> Add list </title>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<link rel="Stylesheet" type="text/css" href="style.css" />
	</head>
	
	<body>

		<center>
			<a href="login.php"><img src="Pokemon_logo.png" /></a>
		<p>
		
		<form method="post">
			Nickname:
			<input type="text" name="nick" />
			<br />
			E-mail:
			<input type="email" name="mail" />
			<br />
			Haslo:
			<input type="password" name="pass" />
			<br />
			Powtorz haslo:
			<input type="password" name="re_pass" />
			<br />
			<p>
			<input type="submit" id="button" value="Zarejestruj" />
		</form>
		
		<?php
			include('db2.php');
		
			if(isset($_POST['nick']) && isset($_POST['mail']) && isset($_POST['pass']))
			{
				$nick=$_POST['nick'];
				$mail=$_POST['mail'];
				$pass=$_POST['pass'];
				$re_pass=$_POST['re_pass'];
		
				if(!empty($nick) && !empty($mail) && !empty($pass) && !empty($re_pass) && $nick!='' && $mail!='' && $pass!='' && $re_pass!='')
				{		
					if ($pass == $re_pass){
						echo "";
						$zapytanie = "INSERT INTO `user`(`id_user`, `nick`, `mail`, `pass`) VALUES ('','$nick','$mail','$pass')";
						$wykonanie_zapytania = mysql_query($zapytanie);
					}else{
						echo "Hasla nie sa zgodne";
					}
	
					if($wykonanie_zapytania){
						echo "Rejestracja zakonczona pomyslnie";
                        header("refresh:0;login.php");
				}else{
						echo "Niektore elementy nie zostały wypelnione";
					}
				}
			}			
		?>
	</body>
</html>	