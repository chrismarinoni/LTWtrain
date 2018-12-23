<?php 
  include '../funzioni.php';
  include '../component/header.php';
  include '../component/footer.php';

	$idUtente = $_SESSION['idUtente'];
	if($idUtente!=""){
		$mysqlDb = new MysqlFunctions;
		$connection = $mysqlDb->connetti();
		$query = "SELECT * FROM utente WHERE idUtente='".$idUtente."'";
		$result = mysql_query($query, $connection) or die('Errore...');
		$stazionePartPreferita = mysql_result($result, 0, 'stazionePartPreferita');
		$stazioneArrPreferita = mysql_result($result, 0, 'stazioneArrPreferita');
	}
    
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

		<script type="text/javascript" lang="javascript" src="../js/autocomplete.js"></script>

		<link href="//maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet">


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
					<div class="card border-dark mb-3 clickable" style="max-width: 25rem;" id="biglietto">
						<div class="card-header">Biglietto</div>
						<div class="card-body text-dark">
							<h5 class="card-title">Biglietto del treno</h5>
							<p class="card-text">Clicca qui sopra per procedere all'acquisto di un biglietto del treno.</p>
						</div>
					</div>
				</div>
				<div class="col-md-5">
					<div class="card border-dark mb-3 clickable" style="max-width: 25rem;" id="abbonamento">
						<div class="card-header">Abbonamento</div>
						<div class="card-body text-dark">
							<h5 class="card-title">Abbonamento mensile ed annuale</h5>
							<p class="card-text">Clicca qui per procedere all'acquisto di un abbonamento del treno.</p>
						</div>
					</div>
				</div>
			</div>
		</div>
			<form name="ricerca">
					<div class="hidden" id="form">
						<h2 id="iniziamo">
							Iniziamo.
						</h2>
						<h4 class="hidden" id="istruzioni">Inserisci le informazioni richieste.</h4>

						<div class=" mt-5 mb-5 hidden" id="step1">
							<div class = "row">
								<div class="col-md-7 col-lg-9">
									<div class="input-group-lg mb-4">
										<label for="inputPartenza" style="font-size: 1.4rem"><strong>Partenza</strong></label>
										<input name="partenza" type="text" id="partenza" class="form-control " placeholder="Stazione Partenza" required autofocus >				
										<div id="response" class="result hidden"></div>
									</div>

											
									<div class="input-group-lg mb-4">
										<label for="inputDestinazione" style="font-size: 1.4rem"><strong>Destinazione</strong></label>
										<input name="destinazione" type="text" id="destinazione" class="form-control  " placeholder="Stazione Destinazione" required>
										<div id="responseDest" class="result hidden"></div>
									</div>
									

									<div class="checkbox-personal">
										<label style="font-size: 1.2em">
											<input name="ar" type="checkbox" value="" id="ar">
											<span class="cr"><i class="cr-icon fa fa-check"></i></span>
											Andata e Ritorno
										</label>
									</div>


									<button type="button" class="btn btn-primary btn-lg mt-2" id="goToStep2">Prosegui</button>
									<button type="button" class="btn btn-secondary btn-lg mt-2" id="goBackB1">Indietro</button>
								</div>
							
								<div class="col-md-5 col-lg-3">
									<?php if($idUtente != "") {
										if($stazionePartPreferita != ""){
											echo(
												'
												<b style="font-style:1.1rem">I tuoi percorsi preferiti</b><br />
												<span class="mt-2 mb-3"><a style="color: blue;" onclick="setDest(\''.$stazionePartPreferita.'\',\''.$stazioneArrPreferita.'\')">'.$stazionePartPreferita. ' > '. $stazioneArrPreferita .'</a></span>
												<span><a style="color: blue;" onclick="setDest(\''.$stazioneArrPreferita.'\',\''.$stazionePartPreferita.'\')"><p>'.$stazioneArrPreferita. ' > '.$stazionePartPreferita .'</p></a></span>'
											);
										} else {
											echo(
												'
												<b style="font-style:1.1rem">I tuoi percorsi preferiti</b><br />
												<p>Nessuna stazione preferita (account non ancora completato)</p>'
											);
										}
										
									}
									?>
									
								</div>
							</div>
						</div>
					</div>

					<div class="hidden" id="form2">
						<h2>
							Andata
						</h2>
						<h4 >I campi contrassegnati da * sono obbligatori</h4>

						<div class=" mt-5 mb-5" id="step2">
							<div class="col-md-6 col-sm-3 col-lg-9 input-group-lg mb-4">
								<label for="dataPartenza" style="font-size: 1.4rem"><strong>Giorno di partenza</strong>*</label>
								<input name="dataPartenza" type="date" id="dataPartenza" class="form-control" placeholder="Stazione Partenza" onChange="selezione(1)" required >				
							</div>

									
							<div class="col-md-6 col-sm-3 mb-4 col-lg-9 input-group-lg">
								<label for="fasciaOrariaPartenza" style="font-size: 1.4rem"><strong>Fascia oraria</strong></label>
								<select name="fasciaOrariaPartenza"  id="fasciaOrariaPartenza" class="form-control" disabled>
									<option value="7/11">Mattina (7-11)</option>
									<option value="12/15">Pranzo (12-15)</option>
									<option value="16/18">Pomeriggio (16-18)</option>
									<option value="19/22">Sera (19-22)</option>
								</select>
							</div>

							<button type="button" class="btn btn-primary btn-lg ml-3 mt-2" id="goToRisultatiPart">Ricerca andata</button>
							<button type="button" class="btn btn-secondary btn-lg ml-3 mt-2" id="goBackB2">Indietro</button>
						</div>
					</div>



					<div class="hidden" id="risultatiAndata">
						<h2>
							Risultati per l'andata
						</h2>
						<div id="boxRisultatiAndata">
							Risultati in caricamento...
						</div>
						<div class="row">
							<button type="button" class="btn btn-primary btn-lg ml-3 mt-4 mb-4 hidden" id="goToCheckOut">Vai al checkout</button> &nbsp;
							<button type="button" class="btn btn-primary btn-lg ml-3 mt-4 mb-4 hidden" id="goToForm3">Prosegui con il ritorno</button> &nbsp;
							<button type="button" class="btn btn-secondary btn-lg mt-4 mb-4" id="goBackB3">Indietro</button>
						</div>
						
					</div>



					<div class="hidden" id="form3">
						<h2>
							Ritorno
						</h2>
						<h4 >I campi contrassegnati da * sono obbligatori</h4>

						<div class=" mt-5 mb-5" id="step2">
							<div class="col-md-6 col-sm-3 col-lg-9 input-group-lg mb-4">
								<label for="dataRitorno" style="font-size: 1.4rem"><strong>Giorno di ritorno</strong>*</label>
								<input name="dataRitorno" type="date" id="dataRitorno" class="form-control" placeholder="Stazione Partenza" onChange="selezione(2)" >				
							</div>

									
							<div class="col-md-6 col-sm-3 mb-4 col-lg-9 input-group-lg">
								<label for="fasciaOrariaRitorno" style="font-size: 1.4rem"><strong>Fascia oraria</strong></label>
								<select name="fasciaOrariaRitorno"  id="fasciaOrariaRitorno" class="form-control" disabled>
									<option value="7/11">Mattina (7-11)</option>
									<option value="12/15">Pranzo (12-15)</option>
									<option value="16/18">Pomeriggio (16-18)</option>
									<option value="19/22">Sera (19-22)</option>
								</select>
							</div>

							<button type="button" class="btn btn-primary btn-lg ml-3 mt-2" id="goToRisultatiDest">Ricerca ritorno</button>
							<button type="button" class="btn btn-secondary btn-lg ml-3 mt-2" id="goBackB4">Indietro</button>
						
						</div>
					</div>

					
					<div class="hidden" id="risultatiRitorno">
						<h2>
							Risultati per il ritorno 
						</h2>
						<div id="boxRisultatiRitorno">
							Risultati in caricamento...

						</div>

						<button type="button" class="btn btn-primary btn-lg mt-4 mb-4" id="goToCheckOut2">Vai al checkout</button>
						<button type="button" class="btn btn-secondary btn-lg mt-4 mb-4" id="goBackB5">Indietro</button>
					</div>
             
              </form>
			 
			 <form name="abbonamento" action="abbonamento.php" method="post">
					<div class="hidden" id="formAbb">
						<h2 id="iniziamo2">
							Iniziamo
						</h2>
						<h4 class="hidden" id="istruzioniAbb">Inserisci le informazioni richieste</h4>
						<div class="mt-5 mb-5 hidden" id="passo1">
							<div class="col-md-6 col-sm-3 col-lg-9 input-group-lg mb-4">
								<label for="stazione1" style="font-size: 1.4rem"><strong>Stazione 1</strong></label>
								<select name="stazione1" id="stazione1" class="form-control" required autofocus>
									<option value="romaTermini">Roma Termini</option>
									<option value="romaTiburtina">Roma Tiburtina</option>
									<option value="milanoCentrale">Milano Centrale</option>
									<option value="firenzeSantaLucia">Firenze Santa Lucia</option>
									<option value="napoliCentrale">Napoli Centrale</option>
									<option value="torino">Torino Porta Nuova</option>
									<option value="genova">Genova</option>
									<option value="venezia">Venezia</option>
									<option value="bologna">Bologna Centrale</option>
									<option value="trieste">Trieste</option>
									<option value="ladispoli">Ladispoli-Cerveteri</option>
								</select>
								
							</div>
							<div class="col-md-6 col-sm-3 mb-4 col-lg-9 input-group-lg">
								<label for="stazione2" style="font-size: 1.4rem"><strong>Stazione 2</strong></label>
								<select name="stazione2" id="stazione2" class="form-control" required >
									<option value="romaTermini">Roma Termini</option>
									<option value="romaTiburtina">Roma Tiburtina</option>
									<option value="milano">Milano Centrale</option>
									<option value="firenze">Firenze Santa Lucia</option>
									<option value="napoli">Napoli Centrale</option>
									<option value="torino">Torino Porta Nuova</option>
									<option value="genova">Genova</option>
									<option value="venezia">Venezia</option>
									<option value="bologna">Bologna Centrale</option>
									<option value="trieste">Trieste</option>
									<option value="ladispoli">Ladispoli-Cerveteri</option>
								</select>
						

							</div>
							<button type="button" class="btn btn-primary btn-lg ml-3 mt-2" id="goToPasso2">Prosegui</button>
							<button type="button" class="btn btn-secondary btn-lg ml-3 mt-2" id="goBackA1">Indietro</button>
						</div>
					</div>
					<div class="hidden" id="formAbb2">
						<h2>Abbonamento</h2>
						<div class="mt-5 mb-5" id="passo2">
							<div class="col-md-6 col-sm-3 col-lg-9 input-group-lg">
								<label for="tipoAbbonamento" style="font-size: 1.4rem"><strong>Tipo Abbonamento</strong></label>
								<select name="tipoAbbonamento" id="tipoAbbonamento" class="form-control" required>
									<option value="settimanale">Settimanale (7 giorni)</option>
									<option value="mensile">Mensile (1 Mese)</option>
									<option value="stagionale">Stagionale (3 Mesi)</option>
									<option value="semestrale">Semestrale (6 Mesi)</option>
									<option value="scolastico">Scolastico (9 Mesi)</option>
									<option value="annuale">Annuale (12 Mesi)</option>
								</select>
							</div>
							<div class = "col-md-6 col-sm-3 col-lg-9 input-group-lg mb-4 mt-4">
								<label for="giornoPartenza" ><strong style="font-size: 1.4rem">Giorno d'inizio</strong><br>Il "Giorno d'inizio" è il giorno in cui vuoi che il tuo abbonamento entri in vigore. Qualora tu abbia acquistato un altro abbonamento valido per la stessa tratta con scadenza successiva a quella qui inserita, la data di inizio sarà il giorno seguente alla scadenza naturale del tuo abbonamento. </label>
								<input name="giornoPartenza" type="date" id="giornoPartenza" class="form-control " onChange="cq()" required>
							</div>
							<input class="btn btn-primary btn-lg ml-3 mt-2 " type="submit" id="ricercaAbb" value="Acquista abbonamento">
							<button type="button" class="btn btn-secondary btn-lg ml-3 mt-2" id="goBackA2">Indietro</button>
						</div>
					</div>
			 
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
	
	<script type="text/javascript" lang="javascript" src="../js/biglietteriaScript.js"></script>

	<script>
      $(document).ready(autocomplete(1));
    </script>

    
</body>
    


</html>
