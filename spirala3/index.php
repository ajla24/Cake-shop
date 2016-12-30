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
      if (isset($_REQUEST['ime'])) {
        print "<p>Poslali ste: ".$_REQUEST['ime']."</p>";
		
		$doc = new DOMDocument('1.0');

		$doc->formatOutput = true;

		 // sprema osobu i njenu poruku sa kontakt forme
		 
		$root = $doc->createElement('osoba');
		$root = $doc->appendChild($root);

		$ime = $doc->createElement('ime');
		$ime = $root->appendChild($ime);

		$text = $doc->createTextNode($_REQUEST['ime']);
		$text = $ime->appendChild($text);
		
		$email = $doc->createElement('email');
		$email = $root->appendChild($email);

		$text = $doc->createTextNode($_REQUEST['email']);
		$text = $email->appendChild($text);
		
		$poruka = $doc->createElement('poruka');
		$poruka = $root->appendChild($poruka);

		$text = $doc->createTextNode($_REQUEST['poruka']);
		$text = $poruka->appendChild($text);
		
		// 
		
		$doc->save("test.xml");
		
		$xml=simplexml_load_file("test.xml") or die("Error: Cannot create object");
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
			<li><a href="#" onclick="pribavi_stranicu('lista.php',5)" class="meni_opcija">Izvjestaj</a></li>
		</ul>
	</div>
	<div id="glavni">
	<div class="red">
	<h2>NOVOSTI I OBAVJEŠTENJA</h2>
	
		<div class="kolona dva dupla"><div class="crveno_centritano">Novo u ponudi!!</div><br>Probajte naš novi čokoladni okus! <b>Nutela-cake</b> je idealan za sve ljubitelje čokolade.
		Ako ste i Vi među njima, obavezno nas posjetite!</div>
		
		<div class="kolona dva dupla"><div class="crveno_centritano">Obavještenje</div><br>Obavještavamo naše drage i vjerne kupce, da će za vrijeme praznika 25.11. naše radno vrijeme biti
		skraćeno <b>(08:00-12:00 sati)</b>.
		</div>
	</div>
	
	<div class="red"> 
	<h3>SPECIJALNA PONUDA</h3>
		
		<div class="kolona dva puna">
			<div class="crveno_centritano">Ponuda MJESECA!</div><br>Ne propustite Vaše omiljene torte po akcijskim cijenama, samo ovaj mjesec
			naša najprodavanija <b>Monte torta snižena 30%!</b>
		</div>
		
		<div class="kolona dva puna">
			<div class="crveno_centritano">Ponuda DANA!</div><br>Samo danas, uz kupovinu <b>bilo koja dva kolača, treći gratis!</b> 
			Uživajte u divnom danu uz kolač više!
		</div>
	</div>

	<div class="kraj">
	<p>&copy; Copyright, All Right Reserved</p>
	</div>
	</div>
	
</body>
</html>