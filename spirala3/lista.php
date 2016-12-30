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

$xml=simplexml_load_file("test.xml") or die("Error: Cannot create object");
		print_r($xml);



		?>
	 
	<h2> IZVJEŠTAJ </h2>
	
	<div>
	<label>Novost: <br> </label>
	<textarea rows="5" cols="70" id="novost" name="novost" value="<?php print_r($xml) ?>" ></textarea>
	<button type="button" value="Spasi" onclick="spasiNovost()"> Spasi </button>
	<button type="button" value="Unesi" onclick="funkc()"> Pregled narudzbe </button>

	</div>
	
</body>
</html>
	