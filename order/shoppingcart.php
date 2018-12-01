<?php
	session_start();
	if($_SESSION['idUtente'] == "")
		header("location: ../account/signin.html");
	if($_SESSION['acquistoInCorso'] != 1)
		header("location: ../index.php");
	$codViaggio = $_SESSION['codViaggio'];
    $partenza = $_SESSION['stPartenza'];
    $destinazione = $_SESSION['stArrivo'];
	$prezzo = $_SESSION['prezzo'];
	$operatore = $_SESSION['operatore'];
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
				  <img class="mb-3" src="https://cdn2.iconfinder.com/data/icons/harry-potter-colour-collection/60/28_-_Harry_Potter_-_Colour_-_Hogwarts_Express-512.png" alt="" width="128" height="128">
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
								 							<a href="#">Biglietto <?php echo($operatore); ?></a>
								 							<div class="product-info">
									 							<div>Partenza: <span class="value"><?php echo($partenza); ?></span></div>
									 							<div>Destinazione: <span class="value"><?php echo($destinazione); ?></span></div>
									 						</div>
									 					</div>
							 						</div>
							 						<div class="col-md-4 quantity">
							 							<b><label for="quantity">Quantit&agrave;:</label></b>
															<input id="quantity" type="number" value ="1" class="form-control quantity-input" min="1" max="5">
													 </div>
							 						<div class="col-md-3 price">
							 							<span id="prezzo"><?php echo($prezzo); ?></span>€
							 						</div>
							 					</div>
							 				</div>
					 					</div>
					 				</div>
				 				</div>
				 			</div>
			 			</div>
			 			<div class="col-md-12 col-lg-4">
			 				<div class="summary">
			 					<!-- <h3>Summary</h3> -->
			 					<!-- <div class="summary-item"><span class="text">Subtotal</span><span class="price">$360</span></div>
			 					<div class="summary-item"><span class="text">Discount</span><span class="price">$0</span></div>
			 					<div class="summary-item"><span class="text">Shipping</span><span class="price">$0</span></div> -->
			 					<div class="summary-item"><span class="text">Totale</span><span class="price" id="totale"><?php echo($prezzo."€"); ?></span></div>
			 					<button type="button" class="btn btn-primary btn-lg btn-block">Checkout</button>
				 			</div>
			 			</div>
					 </div> 
		 		</div>
			 </div>
		</section>
</body>
<script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>

<script>
	function myFunction() {
    var x = document.getElementById("quantity");
	var prezzo = document.getElementById("prezzo").val; 
	x.addEventListener("input", function(e) {
    	var valore = x.value;
		var tot = valore * prezzo;
		alert("OPS" + tot);
		document.getElementById("totale").innerHTML = to;
	}, false);
</script>

</body>
</html>