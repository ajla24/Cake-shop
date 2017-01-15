<html>
<body>
 
 
<?php
session_start();

	$veza = new PDO("mysql:dbname=baza;host=mysql-57-centos7", "korisnik", "sifra");

     $veza->exec("set names utf8");
	 
	 if(isset($_POST['sesija-kontakt'])){
		$errMsg = '';
		//username and password sent from Form
		$ime = $_POST['ime'];
		$email = $_POST['email'];
		$poruka = $_POST['poruka'];
		
		if(isset($_SESSION['username']))
		$autor = $_SESSION['username'];
	else $autor = 'guest';
		
$sql="INSERT INTO poruke(ime,email,poruka,autor) values ('$ime', '$email', '$poruka','$autor')";

$veza->exec($sql);

print "Nova poruka uspjesno dodana u bazu podataka.";

unset($_SESSION['sesija-kontakt']);

header('Refresh: 2; URL = index.php');

}
 $veza=null;
?>
</body>
</html>
