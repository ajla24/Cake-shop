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


$veza = new PDO("mysql:dbname=wt8;host=localhost;charset=utf8", "wt8user", "wt8pass");
     $veza->exec("set names utf8");
	 
	 $rezultat = $veza->query("select * from pocetna");
	 
	 if (!$rezultat) {
          $greska = $veza->errorInfo();
          print "SQL greška: " . $greska[2];
          exit();
     }
	 

	 
	



    ?>
<div class="red">
	<h2>NOVOSTI I OBAVJEŠTENJA</h2>
	<div class="kolona dva dupla"><div class="crveno_centritano">Novo u ponudi!!</div><br><?php  $rezultat = $veza->query("select * from pocetna");foreach ($rezultat as $novosti) { if($novosti['tip']=='novost') echo $novosti['text'];}?></div>

<div class="kolona dva dupla"><div class="crveno_centritano">Obavjestenje!</div><br><?php $rezultat = $veza->query("select * from pocetna");
foreach ($rezultat as $novosti) { if($novosti['tip']=='obavjestenje') echo $novosti['text'];}?></div></div>
	
	<div class="red"> 
	<h3>SPECIJALNA PONUDA</h3>
		
		<div class="kolona dva puna">
			<div class="crveno_centritano">Ponuda MJESECA!</div><br><?php $rezultat = $veza->query("select * from pocetna");
foreach ($rezultat as $novosti) { if($novosti['tip']=='ponudaMjeseca') echo $novosti['text'];}?>
		</div>
		
		<div class="kolona dva puna">
			<div class="crveno_centritano">Ponuda DANA!</div><br><?php $rezultat = $veza->query("select * from pocetna");
foreach ($rezultat as $novosti) { if($novosti['tip']=='ponudaDana') echo $novosti['text'];}?>
	</div>

	<div class="kraj red">
	<p>&copy; Copyright, All Right Reserved</p>
	</div>

</body>
</html>