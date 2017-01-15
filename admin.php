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

<h1><img src="cake-logo.gif" class="logo" alt="logo"></h1>

	<div class="meni">
      <ul>
			<li><a href="#" onclick="pribavi_stranicu('cake-shop.php',0)" class="meni_opcija">Home</a></li>
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
			
			<li><a href="admin.php" class="meni_opcija bijelo">Admin-opcije</a></li>
					
			<li class="desno"><a href="logout.php" class="meni_opcija desno">Logout</a></li>
			
		</ul>	</div>
		<h2> <?php
					session_start();
$veza = new PDO("mysql:dbname=baza;host=mysql-57-centos7", "korisnik", "sifra");

     $veza->exec("set names utf8");
	
if(isset($_SESSION['username']) && $_SESSION['username']=='admin'){
	$username = $_SESSION['username'];
	

echo "Dobrodošli, ".$username."!";}

else  header('Refresh: 1; URL = index.php');

				
			?> </h2>

	
	
	<div id="glavni">
	
		<div>
	
	<form action="bazni.php" method='POST'>
	<div>Klikom na dugme ispod mozete pregledati izvještaj podataka pohranjenih u bazu<br><br></div>
    
           <input type='submit' name='bazniporuke' value="Poruke" />
		   <input type='submit' name='baznikorisnici' value="Korisnici" />
		   <input type='submit' name='bazninovosti' value="Novosti i ponude" />
		   <input type='submit' name='baznikupci' value="Kupci" />
		   <input type='submit' name='bazninarudzbe' value="Narudzbe" />
		   <input type='submit' name='baznisve' value="Sve" />
		   </form>
		   <br><br>
		   <form action="bazni.php" method='POST'>
		   Klikom na dugme ispod mozete prebaciti sve kupce iz kupci.xml u bazu podataka u tabelu kupci<br>samo ce se prebaciti oni podaci-kupci koji se ne nalaze u bazi <br>
		   <input type='submit' name='s_xml_kupci' value="IZ XML U BAZU kupci" />
		   <input type='submit' name='s_xml_korisnici' value="IZ XML U BAZU korisnici" />
	</form>
	

<?php>

<?>				
				
	</div>

</div>
	
	
</body>
</html>
