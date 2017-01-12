<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Spirala 1</title>
	<link rel="stylesheet" href="stil.css">
	<meta name="viewport" content="width=device-width" />
	<script src="cake-js.js"> </script>
</head>
<?php

session_start();

$veza = new PDO("mysql:dbname=wt8;host=localhost;charset=utf8", "wt8user", "wt8pass");
     $veza->exec("set names utf8");


if(isset($_POST['s_narudzba'])){
		$errMsg = '';
		//username and password sent from Form
		$ime = $_POST['ime'];
		$prezime= $_POST['prezime'];
		$email = $_POST['mail'];
		$adresa = $_POST['adresa'];
		
		$i=0;
		$rezultat = $veza->query("select * from kupci");
		
				
		foreach($rezultat as $kupac)
		{
			if($kupac['ime']==$ime && $kupac['prezime']==$prezime && $kupac['adresa']==$adresa ) $i=1;
		}
		
		if($i==0){
		$sql="INSERT INTO kupci(ime,prezime,adresa,email) values ('$ime', '$prezime', '$adresa','$email')";
		
		$veza->exec($sql);
		print "Novi korisnik uspjesno dodan u bazu podataka.";
		}
		
		
		$rezultat = $veza->query("select * from kupci");
		foreach($rezultat as $kupac)
		{
			if($kupac['ime']==$ime && $kupac['prezime']==$prezime && $kupac['adresa']==$adresa ) $i=$kupac['id'];
		}
		
		
		$kolac = $_POST['lista_kolaca'];
		$kolicina = $_POST['kolicina'];
		$napomena = $_POST['napomena'];
		
		if(isset($_SESSION['username']))
		$autor = $_SESSION['username'];
	else $autor = 'guest';
		
$sql="INSERT INTO narudzba(datum,kolac,kolicina,napomena,kupac) values (NOW(), '$kolac', '$kolicina','$napomena','$i')";

$veza->exec($sql);

print "Nova narudzba uspjesno dodana u bazu podataka.";

unset($_SESSION['sesija-kontakt']);

header('Refresh: 2; URL = index.php');

}

 $veza=null;

?>

<body>


	<h2> Naručite torte i kolače za sebe i svoje najmilije, obradujte ih omiljenom poslasticom!<br></h2>
	
	<div class="red">
		<div class="kolona dva puna"> 
			
				<form name="forma-kupovina" id="forma-kupovina" action="kupovina.php" method="POST">
					
					<h4>Narudzba:<br></h4>
					Ime:<br>
					<input type="text" name="ime" id="ime" required><br>
					Prezime:<br>
					<input type="text" name="prezime" id="prezime" required><br>
					Adresa:<br>
					<input type="text" name="adresa" id="adresa" required><br>
					Email:<br>
					<input type="email" name="mail" id="mail"><br><br>
					
					Kolaci:<br>
					<input list="lista_kolaca" name="lista_kolaca" required> <datalist id="lista_kolaca">
															<option value="kolac1">
															<option value="kolac2">
															</datalist>
					<input type="number" name="kolicina" id="kolicina_k" min="0" max="10" step="1" value="1" required><br>
					
					Napomene i dodatne informacije:<br>
					<textarea name="napomena" rows="4" cols="25" id="dodatno"></textarea><br><br>
					
					
					<input type="submit" value="Unesi narudzbu" name="s_narudzba" onclick="validirajNarudzbu()">
					<div id="greska_n"> </div>
				
				</form>
				</div>
							
			</div>

	
	<div class="kraj">
		<p>&copy; Copyright, All Right Reserved<p>
	</div>

</body>
</html>