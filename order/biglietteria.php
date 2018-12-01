<?php 
  include '../funzioni.php';
  include '../component/header.php';
  include '../component/footer.php';
?>

<!DOCTYPE html>
	<html lang="it" dir="ltr">
	<head>
    	<meta charset="utf-8" />
    	<meta http-equiv="X-UA-Compatible" content="IE=edge">
    	<title>LTWtrain - Biglietteria</title>
    	<meta name="viewport" content="width=device-width, initial-scale=1">
    
		<link href="../css/bootstrap.min.css" rel="stylesheet">

		<link href="../css/style.css" rel="stylesheet">
</head>
<body id ="body">
	
	<?php getHeader(); ?>

	<div class="container mt-4" id="container">
		
		<div id="selezioneProdotto">
			<h2> 
				Seleziona il tipo di prodotto
			</h2>
			<div class="row mt-5">
				<div class="col-md-5">
					<div class="card border-dark mb-3" style="max-width: 25rem;" id="biglietto">
						<div class="card-header">Biglietto</div>
						<div class="card-body text-dark">
							<h5 class="card-title">Biglietto del treno</h5>
							<p class="card-text">Clicca qui sopra per procedere all'acquisto di un biglietto del treno.</p>
						</div>
					</div>
				</div>
				<div class="col-md-5">
					<div class="card border-dark mb-3" style="max-width: 25rem;" id="abbonamento">
						<div class="card-header">Abbonamento</div>
						<div class="card-body text-dark">
							<h5 class="card-title">Abbonamento mensile ed annuale</h5>
							<p class="card-text">Clicca qui per procedere all'acquisto di un abbonamento del treno.</p>
						</div>
					</div>
				</div>
			</div>
		</div>


			 <form action="" method="post">
					<div class="hidden" id="form">
						<h2 id="iniziamo">
							Iniziamo.
						</h2>
						<h4 class="hidden" id="istruzioni">Inserisci le informazioni richieste.</h4>

						<div class=" mt-5 mb-5 hidden" id="step1">
							<div class="col-md-6 col-sm-3 col-lg-9 input-group-lg mb-4">
								<label for="inputPartenza" style="font-size: 1.4rem"><strong>Partenza</strong></label>
								<input name="partenza" type="text" id="inputPartenza" class="form-control " placeholder="Stazione Partenza" required autofocus >				
							</div>

									
							<div class="col-md-6 col-sm-3 mb-4 col-lg-9 input-group-lg">
								<label for="inputDestinazione" style="font-size: 1.4rem"><strong>Destinazione</strong></label>
								<input name="destinazione" type="text" id="inputDestinazione" class="form-control  " placeholder="Stazione Destinazione" required>
							</div>

							 <div>
								Andata e ritorno?
								<div class="material-switch pull-right">
									<input id="someSwitchOptionInfo" name="someSwitchOption001" type="checkbox"/>
									<label for="someSwitchOptionInfo" class="label-info"></label>
								</div>
							</div>

						</div>
					</div>
					
			 		
<!-- 							
							
			 		<div class="col-md-6 col-sm-3 col-lg-9">
			 		<label for="inputDataPartenza"><strong>Data Partenza</strong>*</label>
			 		<input name="dataPartenza" type="date" id="inputDataPartenza" class="form-control is-datetime" placeholder="es  18/10/1997" required>
			 		</div>
			 		<br>
							
							
			 		<div class="col-md-6 col-sm-3 col-lg-9">
			 		<label for="inputDataArrivo">Data Arrivo</label>
			 		<input name="dataArrivo" type="date" id="inputDataArrivo" class="form-control is-datetime" placeholder="es 12/11/1997" >
			 		</div>
			 		<br>
							
							
			 		<div class="col-md-6 col-sm-3 col-lg-9">
			 						<label for="inputOrarioPart">Orario Partenza</label>
			 						<input name="orarioPart" type="time" id="inputOrarioPart" class="form-control  is-time" placeholder="es 14:19">
			 		</div>
			 		<br>
							
						
			 		<div class="col-md-6 col-sm-3 col-lg-9">
			 						<label for="inputOrarioArrivo">Orario Arrivo</label>
			 						<input name="orarioArr" type="time" id="inputOrarioArrivo" class="form-control  is-time" placeholder="es 20:13" >
			 		</div>
			 		<br>
			 		<div class="col-md-6 col-sm-3 col-6">
			 			<h6 class="font-italic">I parametri con * sono obbligatori</h6> 
			 			<button class="btn btn-primary search-button" type="submit" >Cerca</button>
				</div>
									 -->
					
							
             
              
			 </form>
			
            
	</div>

	<div id="wrap">

	</div>
    
    <?php getFooter(); ?>

	<script
		src="https://code.jquery.com/jquery-3.3.1.min.js"
		integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8="
		crossorigin="anonymous">
	</script>
	
    <!-- <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script> -->
    <!-- <script>window.jQuery || document.write('<script src="../assets/js/vendor/jquery-slim.min.js"><\/script>')</script> -->
    <script src="../assets/js/vendor/popper.min.js"></script>
    <script src="../js/bootstrap.min.js"></script>
	

	<script>
		$("#biglietto").click(function(){
			$("#selezioneProdotto").fadeOut("slow", function() {$("#form").fadeIn(1500, function() {$("#istruzioni").fadeIn(2000, function() {$("#step1").fadeIn(1500);} );});});
			
		});
		
	</script>


    
</body>
    


</html>
