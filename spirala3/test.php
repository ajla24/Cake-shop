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

<?
   // error_reporting(E_ALL);
   // ini_set("display_errors", 1);
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
				</div></li>
				</div>			
		</ul>
	</div>
	
	<label><br><br>Unesite username i pasword</label> 
    
         
         <?php
            $msg = '';
            
            if (isset($_POST['login']) && !empty($_POST['username']) 
               && !empty($_POST['password'])) {
				
               if ($_POST['username'] == 'admin' && 
                  $_POST['password'] == '1234') {
                  $_SESSION['valid'] = true;
                  $_SESSION['timeout'] = time();
                  $_SESSION['username'] = 'admin';
                  
                  echo 'tacan username admin i password 1234';
               }else {
                  $msg = 'Unijeli ste pogresan username i pasvord';
               }
            }
         ?>
		 

      
      <div class = "container">
      
         <form role = "form" 
            action = "<?php echo htmlspecialchars($_SERVER['PHP_SELF']); 
            ?>" method = "post">
            
            <input type = "text" name = "username" placeholder = "username = admin" 
               required autofocus></br>
            <input type = "password" name = "password" placeholder = "password = 1234" required>
            <button type = "submit" name = "login">Login</button>
			<?php echo $msg; ?>
         </form>
			
<div>Click here to clean <a href = "logout.php" tite = "Logout">Session. </div>
         
      </div> 
	
</body>
</html>
	