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
   ob_start();
   session_start();
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
			<?php
				if(!isset($_SESSION['login'])) print "<li><a href='login.php' class='meni_opcija'>Login</a></li>";
				else print "<li><a href='admin.php' class='meni_opcija'>Admin</a></li>
				<li><a href='logout.php' class='meni_opcija'>Logout</a></li>";
			?>
			
		</ul>
	</div>
	
	<label><br><br>Unesite username i pasword</label>
    
         
         
		 
      
      <div class = "container">
      
         <form role = "form" 
            action = "admin.php" method = "post">
            <label><br>Username:</label><br>
            <input type = "text" name = "username" placeholder = "username = admin" 
               required autofocus></br>
            <label>Password:</label><br>
			<input type = "password" name = "password" placeholder = "password = admin" required><br><br>
            <button type = "submit" name = "login">Login</button><br>
			
         </form>
		 
		 
		 <?php
            $msg = '';
            
            if (isset($_POST['login']) && !empty($_POST['username']) 
               && !empty($_POST['password'])) {
				
                $user = $_POST['username'];
				$pass = $_POST['password'];
				$xml=simplexml_load_file("login.xml") or die("Error: Nemoguce ucitati login.xml");
				
				if($xml->{'username'} == $user && $xml->{'password'}==$pass) {
						
					
                  $_SESSION['login'] = true;
                  header('Location: admin.php');
                  
				}
				else{
					$_SESSION['login'] = false;
					 header('Refresh: 2; URL = login.php');
				}
				 
               }
			   else {
				  
                  $msg = 'Unijeli ste pogresan username i pasvord!';
               }
            
         ?>
			
<div><br>Klikni da ponistis <a href = "logout.php" tite = "Logout">sesiju.</div>
         
      </div> 
	
</body>
</html>
	