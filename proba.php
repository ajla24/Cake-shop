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

echo "uSPJELO2";
     
     }
	 
	  
	  
	  catch(PDOException $e)
    {
    echo $e->getMessage();
    }

	 
	



    ?>


<h1><img src="cake-logo.gif" class="logo" alt="logo"></h1>

	
</body>
</html>