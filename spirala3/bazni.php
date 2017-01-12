<html>
<head>
	<meta charset="UTF-8">
	<title>Spirala 1</title>
	<link rel="stylesheet" href="stil.css">
	<meta name="viewport" content="width=device-width" />
	<script src="cake-js.js"> </script>
	<script src="jquery.min.js"></script>
</head>
<body>
 
 			
<div><br>Klikni da se vratis <a href = "admin.php"  = "Logout">nazad</a></div>
<form action="bazni.php" method='POST'><br>
 <input type='submit' name='bazniporuke' value="Poruke" />
		   <input type='submit' name='baznikorisnici' value="Korisnici" />
		   <input type='submit' name='bazninovosti' value="Novosti i ponude" />
		   <input type='submit' name='baznikupci' value="Kupci" />
		   <input type='submit' name='bazninarudzbe' value="Narudzbe" />
		   <input type='submit' name='baznisve' value="Sve" />

	</form>
 
<?php
session_start();



$veza = new PDO("mysql:dbname=wt8;host=localhost;charset=utf8", "wt8user", "wt8pass");
     $veza->exec("set names utf8");
	 
	 /////////////////////////
	 if(isset($_POST['s_xml_kupci'])){
	
			$xml = simplexml_load_file("kupci.xml");
			echo "Dodani kupci iz xml kojih prethodni nije bilo:";
			
			foreach ($xml->kupac as $kupac) {
				
				$ime=$kupac->ime;
				$prezime=$kupac->prezime;
				$adresa=$kupac->adresa;
				$email=$kupac->email;
				
				$rezultat = $veza->query("select * from kupci");
				$i=0;
				foreach ($rezultat as $k)
				{
					if($k['ime']==$ime && $k['prezime']==$prezime && $k['adresa']==$adresa) $i=1;
				}
				
				if($i==0)
				{
				$sql="INSERT INTO kupci(ime,prezime,adresa,email) values ('$ime', '$prezime', '$adresa','$email')";
								$veza->exec($sql);
				echo "<br>Kupac: ".$ime." ".$prezime." ".$adresa." dodan.";
				}
				
				
			}
			
	 }
	 	 /////////////////////////
		 
		 
		 if(isset($_POST['s_xml_korisnici'])){
	
			$xml = simplexml_load_file("korisnici.xml");
			echo "Dodani korisnici iz xml kojih prethodni nije bilo:";
			
			foreach ($xml->korisnik as $korisnik) {
				
				$username=$korisnik->username;
				$password=$korisnik->password;
				
				$rezultat = $veza->query("select * from korisnici");
				$i=0;
				foreach ($rezultat as $k)
				{
					if($k['username']==$username) $i=1;
				}
				
				if($i==0)
				{
				$sql="INSERT INTO korisnici(username,password) values ('$username', '$password')";
								$veza->exec($sql);
				echo "<br>Korisnik: ".$username." dodan.";
				}
				
				
			}
			
	 }
	 ////////////////
	 
	  if(isset($_POST['s_izmijeni']) && isset($_POST['id']) ){

		 $izmjena=$veza->query("update pocetna set text='".$_POST['text']."' where id='".$_POST['id']."'");
		 
		 
		 if($izmjena == true ) echo "Promjene spremljene";
		 else echo "Promjene nisu spremljene.";
			unset($_SESSION['s_obrisi_kupce']);		 
	  }
	 
	 	 /////////////////////////
	 
	  if(isset($_POST['s_obrisi_kupce']) && isset($_POST['id']) ){

		 $brisanje=$veza->query("delete from kupci where id='".$_POST['id']."'");
		 
		 
		 if($brisanje == true ) echo "Kupac je obrisan.";
		 else echo "Kupac nije obrisan. Povezan sa tabelom narudzbe.";
			unset($_SESSION['s_obrisi_kupce']);		 
	  }
	 
	 ///////////////////////////////////
	 
	  if(isset($_POST['s_obrisi_poruke']) && isset($_POST['ID']) ){

		 $brisanje=$veza->query("delete from poruke where ID='".$_POST['ID']."'");
		 
		 if($brisanje == true ) echo "Poruka je obrisana.";
		 else echo "Poruka nije obrisana.";
		 
			unset($_SESSION['s_obrisi_poruke']);		 
	  }
	 
	 ////////////////////////
	 
	  if(isset($_POST['s_obrisi_narudzbe']) && isset($_POST['id']) ){

		 $brisanje=$veza->query("delete from narudzba where id='".$_POST['id']."'");
		 
		 if($brisanje == true ) echo "Narudzba je obrisana.";
		 else echo "Narudzba nije obrisana.";
		 
			unset($_SESSION['s_obrisi_narudzbe']);		 
	  }
	 
	 ///////////////////////////////////
	 
	 

	 /////////////////////////
	 
	  if(isset($_POST['s_obrisi_korisnike']) && isset($_POST['username'])){

		 $brisanje=$veza->query("delete from korisnici where username='".$_POST['username']."'");

if($brisanje == true ) echo "Korisnik je obrisan.";
		 else echo "Kupac nije obrisan. Povezan sa tabelom poruke-autor.";
		 
unset($_SESSION['s_obrisi_korisnike']);			 
	  }
	 
	 ///////////////////////////////////
	 
	 /////////////////////////
	 

	 	 ///////////////////////////////////
	 
	 if(isset($_POST['bazniporuke']) || isset($_POST['baznisve'])){
		 $errMsg = '';
		
		$rezultat = $veza->query("select * from poruke");
	 
     if (!$rezultat) {
          $greska = $veza->errorInfo();
          print "SQL greška: " . $greska[2];
          exit();
     }

	print "<h2>Poruke iz baze podataka: <br> </h2>";
	$i=0;
      foreach ($rezultat as $poruka) {
		  $i++;
		 
		echo '<form action="" method="post"><div class="kolona" name="ime"><b>Poruka br.'.$i." </b><br>Ime: " .$poruka['ime']. "<br>";
		echo "Email: " . $poruka['email']."<br>";
		echo "Poruka: " . $poruka['poruka'] . "<br>";
		echo "Autor:" . $poruka['autor']."<br>";
		echo "<input type='hidden' name='ID' value='".$poruka['ID']. "'><input type='submit' value='obrisi' name='s_obrisi_poruke'></div></form>";
	 } 
	 }
	 
	 ///////////////////////////////////////////
	 
	 if(isset($_POST['baznikorisnici']) || isset($_POST['baznisve'])){
		 $errMsg = '';
		
		$rezultat = $veza->query("select * from korisnici");
	 
     if (!$rezultat) {
          $greska = $veza->errorInfo();
          print "SQL greška: " . $greska[2];
          exit();
     }
	 
	print "<h2 class='red'>Korisnici iz baze podataka: <br> </h2>";
	$i=0;
      foreach ($rezultat as $korisnik) {
		  $i++;
		 
		echo '<form action="" method="post"><p><div class="kolona"><b>Korisnik br.'.$i." </b><br>Ime: " .$korisnik['username']. "<br>";
		echo "Sifra: " . $korisnik['password']."<br>";
		echo "<input type='hidden' name='username' value='".$korisnik['username']. "'><input type='submit' value='obrisi' name='s_obrisi_korisnike'></div></form>";
	
	 } 
	 }
	 
	 ///////////////////////////////////////////
	 
	 if(isset($_POST['baznikupci']) || isset($_POST['baznisve'])){
		 $errMsg = '';
		
		$rezultat = $veza->query("select * from kupci");
	 
     if (!$rezultat) {
          $greska = $veza->errorInfo();
          print "SQL greška: " . $greska[2];
          exit();
     }
	 
	print "<h2 class='red'>Kupci iz baze podataka: <br> </h2>";

      foreach ($rezultat as $kupac) {
		 
		echo '<form action="" method="post"><p><div class="kolona">Ime: ' .$kupac['ime']. "<br>";
		echo "Prezime: " . $kupac['prezime']."<br>";
		echo "Adresa: " . $kupac['adresa']."<br>";
		echo "Email: " . $kupac['email']."<br>";
		echo "<input type='hidden' name='id' value='".$kupac['id']. "'><input type='submit' value='obrisi' name='s_obrisi_kupce'></div></form>";
	
	 } 
	 }
	 
	 ///////////////////////////////////////////
	 
	 if(isset($_POST['bazninarudzbe']) || isset($_POST['baznisve'])){
		 $errMsg = '';
		
		
		$rezultat = $veza->query("select * from narudzba");
		
	 
     if (!$rezultat) {
          $greska = $veza->errorInfo();
          print "SQL greška: " . $greska[2];
          exit();
     }
	 
	print "<h2 class='red'>Narudzbe iz baze podataka: <br> </h2>";

      foreach ($rezultat as $narudzba) {
		 
		echo '<form action="" method="post"><p><div class="kolona">Datum: ' .$narudzba['datum']. "<br>";
		echo "Kolac: " . $narudzba['kolac']."<br>";
		echo "Kolicina: " . $narudzba['kolicina']."<br>";
		echo "Napomena: " . $narudzba['napomena']."<br>";
		
	
		$kupci = $veza->query("select * from kupci");
		foreach ($kupci as $kupac)
		{
			
			if($kupac['id'] == $narudzba['kupac'])
			{
			echo "Kupac: ". $kupac['ime']." ".$kupac['prezime']."<br>";
			}
			
		}
		
		echo "<input type='hidden' name='id' value='".$narudzba['id']. "'><input type='submit' value='obrisi' name='s_obrisi_narudzbe'></div></form>";
	
	 } 
	 }
	 
	 
	///////////////////////////////////////////
	 if(isset($_POST['bazninovosti']) || isset($_POST['baznisve'])){
		 $errMsg = '';
		
		$rezultat = $veza->query("select * from pocetna");
	 
     if (!$rezultat) {
          $greska = $veza->errorInfo();
          print "SQL greška: " . $greska[2];
          exit();
     }
	 
	print "<h2 class='red'>Novosti i ponude: <br> </h2>";

      foreach ($rezultat as $novost) {
		
		if($novost['tip'] == 'novost')
			echo '<form action="" method="post"><p><div class="kolona"><b>Novost:</b><br>Detalji:<br><textarea cols="80" 
       rows="3" name="text">'.$novost['text'].'</textarea><br>Autor:'.$novost['autor'].'<br><input type="hidden" name="id" value="'.$novost['id']. '"><input type="submit" value="Spasi izmijene" name="s_izmijeni"></div></p></form>';
		else if($novost['tip'] == 'obavjestenje')
			echo '<form action="" method="post"><p><div class="kolona"><b>Obavjestenje:</b><br>Detalji:<br><textarea cols="80" 
       rows="3" name="text">'.$novost['text'].'</textarea><br>Autor:'.$novost['autor'].'<br><input type="hidden" name="id" value="'.$novost['id']. '"><input type="submit" value="Spasi izmijene" name="s_izmijeni"></div></p></form>';
		else if($novost['tip'] == 'ponudaMjeseca')
			echo '<form action="" method="post"><p><div class="kolona"><b>Ponuda mjeseca:</b><br>Detalji:<br><textarea cols="80" 
       rows="3" name="text">'.$novost['text'].'</textarea><br>Autor:'.$novost['autor'].'<br><input type="hidden" name="id" value="'.$novost['id']. '"><input type="submit" value="Spasi izmijene" name="s_izmijeni"></div></p></form>';
		else if($novost['tip'] == 'ponudaDana')
			echo '<form action="" method="post"><p><div class="kolona"><b>Ponuda dana:</b><br>Detalji:<br><textarea cols="80" 
       rows="3" name="text">'.$novost['text'].'</textarea><br>Autor:'.$novost['autor'].'<br><input type="hidden" name="id" value="'.$novost['id']. '"><input type="submit" value="Spasi izmijene" name="s_izmijeni"></div></p></form>';

	
	 } 
	 }



//header('Refresh: 2; URL = bazni.php');


 $veza=null;
	 
?>
</body>
</html>