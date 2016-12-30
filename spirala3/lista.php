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

	 
	<h2> IZVJEŠTAJ </h2>
	
	<div>
	<form method="POST" action="izvjestaj.php"><input type='submit' name='pdf' value='Generiši izvještaj' /></form>
	<?php
	require('/fpdf/fpdf.php');

			$pdf = new FPDF();
			$pdf->AddPage();
			$pdf->SetFont('Times','B',19);
			$pdf->Write(3, 'Korisnici Cake Shopa');
			$pdf->Ln(20);
			$xml = simplexml_load_file("izvjestaj.xml");
			foreach ($xml->korisnik as $korisnik) {
				
				$pdf->Write(2, 'Ime korisnika: ' . $korisnik->ime);
				$pdf->Ln(10);
				$pdf->Write(2, 'E-Mail adresa korisnika: ' . $korisnik->mail);
				$pdf->Ln(30);
				}
			$pdf->Output('F', 'izvjestaj.pdf');
		
		?>

	</div>
	
</body>
</html>
	