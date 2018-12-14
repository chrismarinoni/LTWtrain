<?php
	session_start();
	if($_SESSION['idUtente'] == "")
		// header("location: ../account/signin.html");
	if($_SESSION['acquistoInCorso'] != 1)
		// header("location: ../index.php");
	
	if(!isset($_POST['tipoAbbonamento'])){
		$codViaggioAndata = $_SESSION['codViaggioAndata'];
		$partenza = $_SESSION['stPartenza'];
		$destinazione = $_SESSION['stArrivo'];
		$prezzoAndata = $_SESSION['prezzoAndata'];
		$operatoreAndata = $_SESSION['operatoreAndata'];
		$giornoAndata = explode("-", $_SESSION['giornoAndata']);
		$giornoAndata = $giornoAndata[2]."/".$giornoAndata[1]."/".$giornoAndata[0];
		$orarioAndata = $_SESSION['orarioAndata'];
		$codViaggioRitorno = $_SESSION['codViaggioRitorno'];

		$prezzoRitorno = $_SESSION['prezzoRitorno'];
		$operatoreRitorno = $_SESSION['operatoreRitorno'];
		$giornoRitorno = $_SESSION['giornoRitorno'];
		$orarioRitorno = $_SESSION['orarioRitorno'];
		
		$prezzoTotale = $prezzoAndata + $prezzoRitorno;
	} else {
		$tipoAbbonamento = $_POST['tipoAbbonamento'];
		//DA COMPLETARE
	}
	
?>

<!DOCTYPE html>
<html>
<head>
	<title>Procedi con l'acquisto - LTWtrain</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="../css/bootstrap.min.css">
	<link rel="stylesheet" href="../css/shoppingcart.css">

	



</head>
<body>
	 	<section class="shopping-cart dark" id="shopping-cart">
	 		<div class="container">
		        <div class="block-heading">
				  <a href="../index.php"><img class="mb-3" src="https://cdn2.iconfinder.com/data/icons/harry-potter-colour-collection/60/28_-_Harry_Potter_-_Colour_-_Hogwarts_Express-512.png" alt="" width="128" height="128"></a>
		          <h2>Procedi con gli acquisti</h2>
		          <p>Seleziona la quantit&agrave; del biglietto che vuoi acquistare.</p>
		        </div>
		        <div class="content">
	 				<div class="row">
	 					<div class="col-md-12 col-lg-8">
	 						<div class="items">
				 				<div class="product">
				 					<div class="row">
					 					<div class="col-md-3">
					 						<img class="img-fluid mx-auto d-block image" src="https://cdn3.iconfinder.com/data/icons/travelling-icon-set-ii-part/800/ticket-128.png">
					 					</div>
					 					<div class="col-md-8">
					 						<div class="info">
						 						<div class="row">
							 						<div class="col-md-5 product-name">
							 							<div class="product-name">
								 							<a href="#">Biglietto <?php if($codViaggioRitorno != "")echo("andata"); ?></a>
								 							<div class="product-info">
									 							<div>Partenza: <span class="value"><?php echo($partenza); ?></span></div>
									 							<div>Destinazione: <span class="value"><?php echo($destinazione); ?></span></div>
																<div>Giorno: <span class="value"><?php echo($giornoAndata); ?></span></div>
																<div>Orario partenza: <span class="value"><?php echo($orarioAndata); ?></span></div>
									 							<div>Operatore: <span class="value"><?php echo($operatoreAndata); ?></span></div>

									 						</div>
									 					</div>
							 						</div>
							 						<div class="col-md-4 quantity">
							 							<b><label for="quantity">Quantit&agrave;:</label></b>
															<input id="quantity" type="number" value ="1" class="form-control quantity-input" min="1" max="5">
													 </div>
							 						<div class="col-md-3 price">
							 							<span id="prezzo"><?php echo($prezzoAndata); ?></span>€
							 						</div>
							 					</div>
										
							 				</div>
					 					</div>
					 				</div>



									 <?php if($codViaggioRitorno != ""){
									 echo('
										<hr class="mt-5" size="1" width="70%" align="center" color="#5ea4f3" noshade>
									 <div class="row">
					 					<div class="col-md-3">
					 						<img class="img-fluid mx-auto d-block image" src="https://cdn3.iconfinder.com/data/icons/travelling-icon-set-ii-part/800/ticket-128.png">
					 					</div>
					 					<div class="col-md-8">
					 						<div class="info">
														<div class="row">
															<div class="col-md-5 product-name">
																<div class="product-name">
																	<a href="#">Biglietto ritorno</a>
																	<div class="product-info">
																		<div>Partenza: <span class="value">'.
																		$destinazione.'</span></div>
																		<div>Destinazione: <span class="value">'.$destinazione.'</span></div>
																	<div>Giorno: <span class="value">'.$giornoRitorno.'</span></div>
																	<div>Orario partenza: <span class="value">'.$orarioRitorno.'</span></div>
																		<div>Operatore: <span class="value">'.$operatoreRitorno.'</span></div>

																	</div>
																</div>
															</div>
															<div class="col-md-4 quantity">
																<b><label for="quantityR">Quantit&agrave;:</label></b>
																<input id="quantityR" type="number" value ="1" class="form-control quantity-input" min="1" max="5">
															</div>
															<div class="col-md-3 price">
																<span id="prezzoR">'.$prezzoRitorno.'</span>€
															</div>
														</div>

							
							 				</div>
					 					</div>
					 				</div>
									 ');
									 } ?>


				 				</div>
				 			</div>
			 			</div>
			 			<div class="col-md-12 col-lg-4">
			 				<div class="summary">
			 					<!-- <h3>Summary</h3> -->
			 					<div class="summary-item"><span class="text">Totale iva esclusa</span><span class="price">$360</span></div>
			 					<div class="summary-item"><span class="text">Iva</span><span class="price">$0</span></div>
			 					<div class="summary-item"><span class="text">Sconto</span><span class="price">0€</span></div>
			 					<div class="summary-item"><span class="text" style="font-size: 1.3rem">Totale</span><span class="price" id="totale" style="font-size: 1.6rem"><b><?php echo($prezzoTotale."€"); ?></b></span></div>
			 					<button type="button" class="btn btn-primary btn-lg btn-block">Checkout</button>
				 			</div>
			 			</div>
					 </div> 
		 		</div>
			 </div>
		</section>

	<script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>


	<!-- DOM -->
	<script>
		function myFunction() {
			
			var qA = document.getElementById("quantity");
			var prezzoA = document.getElementById("prezzo").innerHTML; 
			var totaleA = parseFloat(prezzoA);
			var qR = document.getElementById("quantityR");
			var prezzoR = document.getElementById("prezzoR");
			var totaleR = 0
			if(prezzoR != undefined) {
				prezzoR = prezzoR.innerHTML;
				totaleR = parseFloat(prezzoR);
			}
			var totale = totaleA+totaleR;

			qA.addEventListener("input", function(e) {
				var valore = parseInt(qA.value);
				if(valore > 5) {
					alert("Non puoi acquistare contemporaneamente più di 5 biglietti dello stesso tipo in un unico acquisto");
				}else if (valore < 1) {
					alert("Per procedere con un acquisto devi acquistare almeno un biglietto. Se non vuoi acquistare questi titoli di viaggio, annulla l'acquisto.");	
				} else {
					totaleA = valore * prezzoA;
					totale = totaleR + totaleA;
					document.getElementById("totale").innerHTML = "<b>" + totale + "€ </b>";
				}
			}, false);

			if(prezzoR != undefined){
				qR.addEventListener("input", function(e) {
					var valore = parseInt(qR.value);
					if(valore > 5) {
						alert("Non puoi acquistare contemporaneamente più di 5 biglietti dello stesso tipo in un unico acquisto");
					}else if (valore < 1) {
						alert("Per procedere con un acquisto devi acquistare almeno un biglietto. Se non vuoi acquistare questi titoli di viaggio, annulla l'acquisto.");
					} else {
						totaleR = valore * prezzoR;
						totale = totaleR + totaleA;
						document.getElementById("totale").innerHTML = "<b>" + totale + "€ </b>";
					}
				}, false);
			}
			
		}
		myFunction();
	</script>
								


</body>
</html>