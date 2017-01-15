<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Spirala 1</title>
	<link rel="stylesheet" href="stil.css">
	<meta name="viewport" content="width=device-width" />
	<script src="cake-js.js"> </script>
	<script src="jquery.min.js"></script>
</head>
<body>
<?php
     	  session_start(); 
	  try{



$veza = new PDO("mysql:dbname=baza;host=mysql-55-centos7", "korisnik", "sifra"));
     $veza->exec("set names utf8");
	 
	 $rezultat = $veza->query("select * from pocetna");
	 
	 if (!$rezultat) {
          $greska = $veza->errorInfo();
          print "SQL greška: " . $greska[2];
          exit();
     }
	 
	  }
	  
	  catch(PDOException $e)
    {
    echo $e->getMessage();
    }

	 
	



    ?>


<h1><img src="cake-logo.gif" class="logo" alt="logo"></h1>

	<div class="meni">
      <ul>
			<li><a href="#" onclick="pribavi_stranicu('cake-shop.php',0)" class="meni_opcija bijelo">Home</a></li>
			<li><a href="#" onclick="pribavi_stranicu('proizvodi.php',1)" class="meni_opcija">Proizvodi</a></li>
			<li><a href="#" onclick="pribavi_stranicu('kupovina.php',2)" class="meni_opcija">Kupovina</a></li>
			<li><a href="#" onclick="pribavi_stranicu('galerija.php',3)" class="meni_opcija">Galerija</a></li>
			<li><div class="dropdown">
				<button onclick="meni_funkcija()" class="dropbtn" class="meni_opcija">O nama</button>
				<div id="myDropdown" class="dropdown-sadrzaj">
				<a href="#" onclick="pribavi_stranicu('onama.php',4)">Historija</a>
				<a href="#" onclick="pribavi_stranicu('kontakt.php',4)">Kontakt</a>				
				</div>
				</div></li>
			
			<?php
			try{
				if(!isset($_SESSION['username']))
				{
					print "<li class='desno'><a href='login.php' class='meni_opcija'>Login</a></li>";
				}
				
				else 
				{
					
					if($_SESSION['username']=='admin')
					{
						print "<li><a href='admin.php' class='meni_opcija'>Admin-opcije</a></li>";
					}
					
					print "<li class='desno'><a href='logout.php' class='meni_opcija'>Logout</a></li>";
					
				}
			}
			 
			 catch(exeption $e)
    {
    echo $e;
    }
				

			?>
			
		</ul>
		<h2> <?php
					
	 try{
	if(isset($_SESSION['username']))
	{
		$username = $_SESSION['username'];
		echo "Dobrodošli, ".$username."!";
		}
	 }
catch(exeption $e)
    {
    echo $e;
    }	 
			?> </h2>
			
	</div>
	<div id="glavni">
	<div class="red">
	<h2>NOVOSTI I OBAVJEŠTENJA</h2>
	
	
 <div class="kolona dva dupla"><div class="crveno_centritano">Novo u ponudi!!</div><br><?php try{ 
 $veza = new PDO("mysql:dbname=baza;host=mysql-55-centos7", "korisnik", "sifra");
     $veza->exec("set names utf8");
	 $rezultat = $veza->query("select * from pocetna");foreach ($rezultat as   $novosti) { if($novosti['tip']=='novost') echo $novosti['text'];}} catch(PDOException $e)
    {
    echo $e;
    }?></div>

<div class="kolona dva dupla"><div class="crveno_centritano">Obavjestenje!</div><br><?php try{ 
$konekcija = new PDO("mysql:dbname=baza;host=mysql-55-centos7", "korisnik", "sifra"));
     $veza->exec("set names utf8");
	 $rezultat = $veza->query("select * from pocetna");
foreach ($rezultat as $novosti) { if($novosti['tip']=='obavjestenje') echo $novosti['text'];}} catch(exception $e)
    {
    echo $e;
    }?></div>
		

		</div>
<div class="red"> 
	<h3>SPECIJALNA PONUDA</h3>
	<div class="kolona dva puna">
			<div class="crveno_centritano">Ponuda MJESECA!</div><br><?php try{ 
			$veza = new PDO("mysql:dbname=baza;host=mysql-55-centos7", "korisnik", "sifra"));
			 $rezultat = $veza->query("select * from pocetna");
			foreach ($rezultat as $novosti) { if($novosti['tip']=='ponudaMjeseca') echo $novosti['text'];}} catch(PDOException $e)
    {
    echo $e;
    } ?>
		</div>
		
		<div class="kolona dva puna">
			<div class="crveno_centritano">Ponuda DANA!</div><br><?php try{
				$veza = new PDO("mysql:dbname=baza;host=mysql-55-centos7", "korisnik", "sifra"); $rezultat = $veza->query("select * from pocetna");
				$rezultat = $veza->query("select * from pocetna");
			foreach ($rezultat as $novosti) { if($novosti['tip']=='ponudaDana') echo $novosti['text'];} } catch(PDOException $e)
    {
    echo $e;
    }?>
	</div>

	<div class="kraj red">
	<p>&copy; Copyright, All Right Reserved</p>
	</div>
	</div>

</body>
</html>