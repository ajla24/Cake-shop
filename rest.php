<html>
<head>
	<meta charset="UTF-8">
	<title>Spirala 4</title>

</head>
<body>

Zdravo, izlistat ce se sva lista korisnika za rest.php
ako dodamo na URL ?ime=ajla
izlistat ce se samo korisnici sa imenom ajla, prezimena i adrese
umjesto ajla mozemo koristiti i neko drugo ime koje se nalazi u bazi sa korisnicima
takodje je moguce ukucati ?prezime=sakic ili ?adresa=sarajevo

<?php

session_start();



$veza = new PDO("mysql:dbname=wt8;host=localhost;charset=utf8", "wt8user", "wt8pass");
     $veza->exec("set names utf8");
	 
function zag() {
    header("{$_SERVER['SERVER_PROTOCOL']} 200 OK");
    header('Content-Type: application/json');
    header('Access-Control-Allow-Origin: *');
}

function rest_get($request, $data) 
	{ 
		$veza = new PDO("mysql:dbname=wt8;host=localhost;charset=utf8", "wt8user", "wt8pass");
     $veza->exec("set names utf8");
	 
		if(isset($data['ime']))
		{
			echo "Ukucali ste: ".$data['ime'];

			$sql = $veza->query("select * from restkorisnici where ime='".$data['ime']."'");
			$sql->execute();
			echo json_encode($sql->fetchALL(PDO::FETCH_ASSOC),JSON_PRETTY_PRINT);
		}
		else if(isset($data['prezime']))
		{
			echo "Ukucali ste: ".$data['prezime'];

			$sql = $veza->query("select * from restkorisnici where prezime='".$data['prezime']."'");
			$sql->execute();
			echo json_encode($sql->fetchALL(PDO::FETCH_ASSOC),JSON_PRETTY_PRINT);
		}
		
		else if(isset($data['adresa']))
		{
			echo "Ukucali ste: ".$data['adresa'];

			$sql = $veza->query("select * from restkorisnici where adresa='".$data['adresa']."'");
			$sql->execute();
			echo json_encode($sql->fetchALL(PDO::FETCH_ASSOC),JSON_PRETTY_PRINT);
		}
		
			else
			{
				$sql = $veza->prepare("select * from restkorisnici");
				$sql->execute();
				echo json_encode($sql->fetchALL(PDO::FETCH_ASSOC),JSON_PRETTY_PRINT); 
			}
		
	}
function rest_post($request, $data) { }
function rest_delete($request) { }
function rest_put($request, $data) { }
function rest_error($request) { }

$method  = $_SERVER['REQUEST_METHOD'];
$request = $_SERVER['REQUEST_URI'];

	 
	 

switch($method) {
    case 'PUT':
        parse_str(file_get_contents('php://input'), $put_vars);
        zag(); $data = $put_vars; rest_put($request, $data); break; 
    case 'POST':
        zag(); $data = $_POST; rest_post($request, $data); break;
    case 'GET':
        zag(); $data = $_GET; rest_get($request, $data); break;
    case 'DELETE':
        zag(); rest_delete($request); 
		break;
    default:
        header("{$_SERVER['SERVER_PROTOCOL']} 404 Not Found");
        rest_error($request); break;
}

if($method == 'GET')
{
	echo " GET IZVRSENO! ";	
}

if($method == 'POST')
{
	echo " POST IZVRSENO! ";	
}

	 
?>





</body>
</html>