<?php 
	include '../funzioni.php';
	include '../component/header.php';
	include '../component/footer.php';
	$stazione1=$_POST['stazione1'];
	if ($stazione1=="romaTermini") 
				$stazione1= "Roma Termini";
	else if ($stazione1=="romaTiburtina")
				$stazione1= "Roma Tiburtina";
	else if ($stazione1=="romaTiburtina")
				$stazione1= "Roma Tiburtina";
	else if ($stazione1=="milanoCentrale")
				$stazione1= "Milano Centrale";	
	else if ($stazione1=="firenzeSantaLucia")
				$stazione1= "Firenze Santa Lucia";
	else if ($stazione1=="napoliCentrale")
				$stazione1= "Napoli Centrale";
	else if ($stazione1=="torino")
				$stazione1= "Torino";
	else if ($stazione1=="genova")
				$stazione1= "Genova";
	else if ($stazione1=="venezia")
				$stazione1= "Venezia";
	else if ($stazione1=="trieste")
				$stazione1= "Trieste";
	else 
				$stazione1= "Ladispoli";
	$stazione2=$_POST['stazione2'];
	if ($stazione2=="romaTermini") 
				$stazione2= "Roma Termini";
	else if ($stazione2=="romaTiburtina")
				$stazione2= "Roma Tiburtina";
	else if ($stazione2=="romaTiburtina")
				$stazione2= "Roma Tiburtina";
	else if ($stazione2=="milanoCentrale")
				$stazione2= "Milano Centrale";	
	else if ($stazione2=="firenzeSantaLucia")
				$stazione2= "Firenze Santa Lucia";
	else if ($stazione2=="napoliCentrale")
				$stazione2= "Napoli Centrale";
	else if ($stazione2=="torino")
				$stazione2= "Torino";
	else if ($stazione2=="genova")
				$stazione2= "Genova";
	else if ($stazione2=="venezia")
				$stazione2= "Venezia";
	else if ($stazione2=="trieste")
				$stazione2= "Trieste";
	else 
				$stazione2= "Ladispoli";
	$tipoAbbonamento=$_POST['tipoAbbonamento'];
	if($tipoAbbonamento=="settimanale"){
		$tipoAbbonamento="Settimanale";
		$prezzo="50 €";
	}
	else if($tipoAbbonamento=="mensile"){
		$tipoAbbonamento="Mensile";
		$prezzo="100 €";
	}
	else if($tipoAbbonamento=="stagionale"){
		$tipoAbbonamento="Stagionale";
		$prezzo="150 €";
	}
	else if($tipoAbbonamento=="semestrale"){
		$tipoAbbonamento="Semestrale";
		$prezzo="200 €";
	}
	else if($tipoAbbonamento=="scolastico"){
		$tipoAbbonamento="Scolastico";
		$prezzo="250 €";
	}
	else {
		$tipoAbbonamento="Annuale";
		$prezzo="300 €";
	}
	$giornoPartenza=$_POST['giornoPartenza'];
?>
<!DOCTYPE html>
<html lang="it" dir="ltr">
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no ">
		<meta name="description" content="">
		<meta name="author" content="">
		<title>Abbonamento-LTWtrain</title>
		 <!-- Bootstrap core CSS -->
		<link href="../css/bootstrap.min.css" rel="stylesheet">

		<!-- Custom styles for this template -->
		<link href="../css/style.css" rel="stylesheet">
		
		
	</head>
	<body id="body">
	<?php getHeader(); ?>
	<div class="p-3 p-md-5 text-black bg-splash" id="container">
		<div class="container">
			<h3>Informazioni sul tuo abbonamento </h3>
			<div class="row">
				<div class= "col-sm-3 col-md-6 col-6">
					<h5>Stazione 1</h5>
					<?php echo($stazione1) ?>
				</div>
				<div class= "col-sm-3 col-md-6 col-6">
					<h5>Stazione 2</h5>
					<?php echo($stazione2) ?>
				</div>
			</div> 
			<hr width="5%" color="white">
			<div class="row">
				<div class="col-sm-3 col-md-6 col-6">
					<h5>Data inizio abbonamento</h5>
					<?php echo($giornoPartenza) ?>
				</div>
				<div class="col-sm-3 col-md-6 col-6">
					<h5>Data scadenza abbonamento</h5>
					<?php echo($giornoPartenza) ?>
				</div>
				
			</div>
			<hr width="5%" color="white">
			<div class="row">
				<div class="col-sm-3 col-md-6 col-6">
					<h5>Tipo abbonamento</h5>
					<?php echo($tipoAbbonamento) ?>
				</div>
				<div class="col-sm-3 col-md-6 col-6">
					<h5>Costo</h5>
					<?php echo($prezzo) ?>
				</div>
				
			</div>
			<hr width="5%" color="white">
			<button type="button" class="btn btn-primary btn-lg ml-3 mt-2" id="stampaPdf">Stampa abbonamento</button>
		</div>
	</div>
		
	
		
	

	<?php getFooter(); ?>
	
		
				
							

	</body>
</html>
