<?php
   session_start();
   unset($_SESSION["username"]);
   unset($_SESSION["password"]);
   unset($_SESSION['login']);
   unset($_SESSION['sesija-kontakt']);
   
   echo 'You have cleaned session';
   header('Refresh: 2; URL = index.php');
?>