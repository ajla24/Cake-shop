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
			<li><a href="admin.php" class="meni_opcija">Admin</a></li>
			<li><a href="logout.php" class="meni_opcija">Logout</a></li>
		</ul>
	</div>
	<div id="glavni">
		<div id="unos-recepta">
		<form id="recept" method="POST" action="admin.php">
			<label>Naziv recepta</label>
				<br>
				<input type='text' id='naziv' name='naziv' />
				<br>
				<label>Autor recepta</label>
				<br>
				<input type='text' id='autor' name='autor' />
				<br>
				<label>Sastojci</label>
				<br>
				<textarea name='sastojci' id='sastojci' placeholder="Unesite sastojke"></textarea>
				<br>
				<input type='submit' id='dodaj' name='save-recipe' value="Sačuvaj recept"/>
		</form>
		<div>
		
		<?php
		if(isset($_POST['save-recipe']) && !empty($_POST['naziv']) && !empty($_POST['sastojci']) && !empty($_POST['autor'])){
			$naziv=htmlspecialchars($_POST['naziv']);
			$autor=htmlspecialchars($_POST['autor']);
			$sastojci=htmlspecialchars($_POST['sastojci']);
			
			$xml = simplexml_load_file('recept.xml');
			$recept = $xml->addChild('recept');
			$recept->addChild('naziv', $naziv);
			$recept->addChild('autor', $autor);
			$recept->addChild('sastojci', $sastojci);

			file_put_contents('recept.xml', $xml->asXML());
			
			
			
		}
		
		?>
		<br>
		<br>
		<div id="recepti-lista">
		<h3>Svi recepti</h3>
		<?php
			$xml = simplexml_load_file("recept.xml");
			foreach ($xml->recept as $recept) {

				echo '<div class="recepat"><h4>Naziv: ' . $recept->naziv . '</h4>';
				echo '<h5>Autor: ' . $recept->autor . '</h5>';
				echo '<p>Sastojci: ' . $recept->sastojci . '</p></div>';

			}
		?>
	</div>


	
	
</body>
</html>