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



$veza = new PDO("mysql:dbname=baza;host=mysql-55-centos7;charset=utf8", "korisnik", "sifra");

echo "uSPJELO";
     
     }
	 
	  
	  
	  catch(PDOException $e)
    {
    echo $e->getMessage();
    }
	
	try{



$veza = new PDO("mysql:dbname=baza;host=mysql-55-centos7;charset=utf8", "imeKorisnika", "sifra");

echo "uSPJELO222";
		 $rezultat = $veza->query("select * from pocetna");foreach ($rezultat as   $novosti) { if($novosti['tip']=='novost') echo $novosti['text'];}

		
    else echo "nece"; 
     }
	 
	  
	  
	  catch(PDOException $e)
    {
    echo $e->getMessage();
    }

	 
	



    ?>


<h1><img src="cake-logo.gif" class="logo" alt="logo"></h1>
<div class="kolona dva dupla"><div class="crveno_centritano">Novo u ponudi!!</div><br><?php try{ $veza = new PDO("mysql:dbname=baza;host=mysql-55-centos7;charset=utf8", "imeKorisnika", "sifra");
     $veza->exec("set names utf8");
	 $rezultat = $veza->query("select * from pocetna");foreach ($rezultat as   $novosti) { if($novosti['tip']=='novost') echo $novosti['text'];}} catch(PDOException $e)
    {
    echo $e;
    }?></div>
	
</body>
</html>
