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
			<li><a href = "index.php">Vrati se na meni </a></li>
			
			
			
		</ul>
	</div>   
      
		 <div class = "container kolona jedan puna">
		
		<form id="recept" method="POST" action="">
			
				
            <label><br>Username:</label><br>
            <input type = "text" name = "username" placeholder = "username = admin" 
               required autofocus></br>
            <label>Password:</label><br>
			<input type = "password" name = "password" placeholder = "password = adminpass" required><br><br>
            <input type="submit" name='login' value="Log In"/>
			
         </form>
		
	
		 
            <?php
	

	
	//PDO Database Connection
	try {
		$veza = new PDO("mysql:dbname=baza;host=mysql-55-centos7", "korisnik", "sifra");
		$veza->exec("set names utf8");
	} catch(PDOException $e) {
		echo 'ERROR: ' . $e->getMessage();
	}
	
	if(isset($_POST['login'])){
		$errMsg = '';
		//username and password sent from Form
		$username = $_POST['username'];
		$password = $_POST['password'];
		
		// query
	$result = $veza->prepare("SELECT * FROM korisnici WHERE username= :hjhjhjh AND password= :asas");
	$result->bindParam(':hjhjhjh', $username);
	$result->bindParam(':asas', $password);
	$result->execute();
	$rows = $result->fetch(PDO::FETCH_NUM);
	if($rows > 0) {
		$_SESSION['username'] = $username;
		{
			if($username == 'admin')
				 header("location: admin.php");
			else header("location: index.php");
	}}
	else{
	$errMsg= 'Username and Password are not found';
	}
	}

 
?>
 
			
<div><br>Klikni da ponistis <a href = "logout.php" tite = "Logout">sesiju.</div>
         
      </div> 
	
</body>
</html>
	
