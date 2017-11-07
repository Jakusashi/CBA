<html>
    <?php session_start();
        require_once('db2.php');
    ?>
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
		<title> Shoutbox </title>
		<meta http-equiv="Content-type" content="text/html; charset=utf8mb4_unicode_ci" />
		<link rel="Stylesheet" type="text/css" href="style.css" />
	</head>
	
	<body>

		<center>
			<a href="main.php"><img src="Pokemon_logo.png" /></a>
		<p>
		<div id="shoutbox">
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

					echo "<div id='news2'>";
						echo "<div id='shouttitle'> <img src='avatary/avk.jpg' width='60px' height='60px'> <font face='arial' size='3'> <b> $autor </b> <br /> <font face='arial'> $date </font> </div> <b>  <font face='arial'> $tresc </b> </font>";
					echo "</div>";
					$i++;
				}
                
                
		?>
        <br />
        </div>
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
	</body>
</html>	