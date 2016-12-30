<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Spirala 1</title>
	<link rel="stylesheet" href="stil.css">
	<meta name="viewport" content="width=device-width" />
	<script src="cake-js.js"> </script>
</head>
<body>
<?php
      if (isset($_REQUEST['ime'])) {
        print "<p>Poslali ste: ".$_REQUEST['ime']."</p>";
      } 
	  
	  
    ?>

	
	
	<div class="red">
	<h2>Imate pitanja? Želite saznati više? Kontaktirajte nas!<br><br></h2>
		<div class="kolona dva dupla padi"><b>Kontakt informacije<br><br>Telefon: 033/765-000<br><br>
		Fax: 033/765-002<br><br>
		E-mail: cake-shop@gmail.com<br><br>
		Adresa: Zmaja od Bosne bb </b></div>
		<div class="kolona dva mapa dupla padi">Mapa</div>
	</div>
	

	<div class="red">
	
	<h2 class="lijevo">Pošalji poruku</h2>	
	
		<form name="kontakt-forma" id="kontakt-forma" action="index.php" method="get">
			<div class="kolona">Ime (i prezime):<br>
				<input type="text" id="ime" name="ime"><br>
				<br>Email:<br>
				<input type="email" id="email" name="email"></div>	
			<div class="kolona">
				Poruka:<br>
				<textarea rows="5" cols="70" id="poruka" name="poruka" required></textarea></div>
				<div class="kolona">
				<br><br>
				
				<input type="submit" value="Posalji poruku" onclick="validacijaFormeKontakt()">
				<button onclick="pregledajPoruke()">Pregledaj poruke</button>
				<script>
				
	

				<div id="greska"> </div>				
			</div>
		</form>			
	</div>
		
	<div class="kraj">
	<p>&copy; Copyright, All Right Reserved</p>
	</div>

</body>
</html>