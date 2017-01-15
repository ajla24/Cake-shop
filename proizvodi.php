<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Spirala 1</title>
	<link rel="stylesheet" href="stil.css">
	<meta name="viewport" content="width=device-width"	/>
	<script src="cake-js.js"> </script>
</head>
<body>

	<h2> Naši proizvodi <br></h2>
	<form name="forma-proizvodi" id="forma-proizvodi" >
	<b>Molimo Vas čekirajte ono za šta se veže vaša pretraga</b>:<br><br>
	<label><input type="checkbox" id="chTorte" checked onchange="validacijaFormeProizvodi()">Torte</label>
	<label><input type="checkbox" id="chKolaci" checked onchange="validacijaFormeProizvodi()">Kolaci</label>	
		<div class="red">
			<div class="kolona puna centar kolac"><img src="kolac1.png" class="slika" alt="slika"><br><b>Višnja kolač</b><br> Voćni kolač sa finom kremom i višnjama.</div>
			<div class="kolona puna centar kolac"><img src="kolac2.png" class="slika" alt="slika"><br><b>Jaffa kolač</b><br> Kolač sa plazma keksom i finom sočnom glazurom.</div>
			<div class="kolona puna centar kolac"><img src="kolac3.png" class="slika" alt="slika"><br><b>Hurmašica</b><br>Tradicionalni bosanski kolač, posut orasima.</div>
			<div class="kolona puna centar kolac"><img src="kolac4.png" class="slika" alt="slika"><br><b>Tufahija</b><br>Tradicionalni bosanski kolač sa originalnom kremom.</div>
			<div class="kolona puna centar torta"><img src="torta1.png" class="slika" alt="slika"><br><b>Bony torta</b><br>Torta sa sočnim korama i višnja kremom.</div>
			<div class="kolona puna centar torta"><img src="torta2.png" class="slika" alt="slika"><br><b>Nutela torta</b><br>Torta sa Nutella kremom i plazma keksom.</div>
			<div class="kolona puna centar torta"><img src="torta3.png" class="slika" alt="slika"><br><b>Orange torta</b><br>Torta sa crnom čokoladom i kremom od narandze.</div>
			<div class="kolona puna centar kolac"><img src="kolac5.png" class="slika" alt="slika"><br><b>Bajadera kolač</b><br>Kolač sa lješnik i vanilla kremom. </div>
		</div>
	</form> 
	<div class="kraj">
		<p>&copy; Copyright, All Right Reserved<p>
	</div>
</body>
</html>
