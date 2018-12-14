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

					<div class="hidden" id="form">
						<h2 id="iniziamo">
							Iniziamo.
						</h2>
						<h4 class="hidden" id="istruzioni">Inserisci le informazioni richieste.</h4>

						<div class=" mt-5 mb-5 hidden" id="step1">
							<div class="col-md-6 col-sm-3 col-lg-9 input-group-lg mb-4">
								<label for="inputPartenza" style="font-size: 1.4rem"><strong>Partenza</strong></label>
								<input name="partenza" type="text" id="partenza" class="form-control " placeholder="Stazione Partenza" required autofocus >				
								<div id="response" class="result hidden"></div>
							</div>

									
							<div class="col-md-6 col-sm-3 mb-4 col-lg-9 input-group-lg">
								<label for="inputDestinazione" style="font-size: 1.4rem"><strong>Destinazione</strong></label>
								<input name="destinazione" type="text" id="destinazione" class="form-control  " placeholder="Stazione Destinazione" required>
								<div id="responseDest" class="result hidden"></div>
							</div>
							

							<div class="ml-3 checkbox-personal">
								<label style="font-size: 1.2em">
									<input name="ar" type="checkbox" value="" id="ar">
									<span class="cr"><i class="cr-icon fa fa-check"></i></span>
									Andata e Ritorno
								</label>
							</div>


							<button type="button" class="btn btn-primary btn-lg ml-3 mt-2" id="goToStep2">Prosegui</button>
							<button type="button" class="btn btn-primary btn-lg ml-3 mt-2" id="goBackB1">Indietro</button>

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
								<input name="dataPartenza" type="date" id="dataPartenza" class="form-control" placeholder="Stazione Partenza" required >				
							</div>

									
							<div class="col-md-6 col-sm-3 mb-4 col-lg-9 input-group-lg">
								<label for="fasciaOrariaPartenza" style="font-size: 1.4rem"><strong>Fascia oraria</strong></label>
								<select name="fasciaOrariaPartenza"  id="fasciaOrariaPartenza" class="form-control">
									<option value="7/11">Mattina (7-11)</option>
									<option value="12/15">Pranzo (12-15)</option>
									<option value="16/18">Pomeriggio (16-18)</option>
									<option value="19/22">Sera (19-22)</option>
								</select>
							</div>

							<button type="button" class="btn btn-primary btn-lg ml-3 mt-2" id="goToRisultatiPart">Ricerca andata</button>
							<button type="button" class="btn btn-primary btn-lg ml-3 mt-2" id="goBackB2">Indietro</button>
						</div>
					</div>



					<div class="hidden" id="risultatiAndata">
						<h2>
							Risultati per l'andata
						</h2>
						<div id="boxRisultatiAndata">
							Risultati in caricamento...
						</div>

						<button type="button" class="btn btn-primary btn-lg mt-4 mb-4 hidden" id="goToCheckOut">Vai al checkout</button>
						<button type="button" class="btn btn-primary btn-lg mt-4 mb-4 hidden" id="goToForm3">Prosegui con il ritorno</button>
						<button type="button" class="btn btn-primary btn-lg mt-4 mb-4" id="goBackB3">Indietro</button>
					</div>



					<div class="hidden" id="form3">
						<h2>
							Ritorno
						</h2>
						<h4 >I campi contrassegnati da * sono obbligatori</h4>

						<div class=" mt-5 mb-5" id="step2">
							<div class="col-md-6 col-sm-3 col-lg-9 input-group-lg mb-4">
								<label for="dataRitorno" style="font-size: 1.4rem"><strong>Giorno di ritorno</strong>*</label>
								<input name="dataRitorno" type="date" id="dataRitorno" class="form-control" placeholder="Stazione Partenza" >				
							</div>

									
							<div class="col-md-6 col-sm-3 mb-4 col-lg-9 input-group-lg">
								<label for="fasciaOrariaRitorno" style="font-size: 1.4rem"><strong>Fascia oraria</strong></label>
								<select name="fasciaOrariaRitorno"  id="fasciaOrariaRitorno" class="form-control">
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
             
              
			 
			 <form name="abbonamento" action="shoppingcart.php" method="post">
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
								<select name="stazione2" id="stazione2" class="form-control" required autofocus>
									<option value="roma">Roma Termini</option>
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
							<button type="button" class="btn btn-primary btn-lg ml-3 mt-2" id="goBackA1">Indietro</button>
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
								<input name="giornoPartenza" type="date" id="giornoPartenza" class="form-control" required>
							</div>
							<input class="btn btn-primary btn-lg ml-3 mt-2 " type="submit" id="ricercaAbb" value="Acquista abbonamento">
							<button type="button" class="btn btn-primary btn-lg ml-3 mt-2" id="goBackA2">Indietro</button>
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
	

	<script>

		andataSelezionata = -1;
		ritornoSelezionato = -1;
		andataConfermata = -1;
		partenza = "";
		destinazione = "";
		giornoAndata = "";
		orarioAndata = "";
		giornoRitorno = "";
		orarioRitorno = "";
		prezzoAndata = -1;
		prezzoRitorno = -1;
		operatoreAndata = "";
		id = "";
		id2 = "";

		//valori fadeOut "slow", FadeIn 1500, fadeIn 2000, fadeIn 1500

		$("#biglietto").click(function(){
			$("#selezioneProdotto").fadeOut("fast", function() {$("#form").fadeIn(100, function() {$("#istruzioni").fadeIn(100, function() {$("#step1").fadeIn(100);} );});});
			
		});
		$("#goToStep2").click(function(){
			if($('#partenza').val() == "" || $('#destinazione').val() == ""){
				alert("Inserisci tutti i campi per poter procedere con la ricerca");
			} else {
				$.post("checkRicerca.php", { tipoRicerca: 2, partenza: $('#partenza').val(), destinazione: $('#destinazione').val() }, function(risposta) {
					if (risposta == 3 ) {
						partenza = $('#partenza').val();
						destinazione = $('#destinazione').val();
						$("#form").slideUp(1500);
						$("#form2").slideDown(1500);
						if(document.ricerca.ar.checked) $("#goToStep3").show();
						else $("#risultatiPartenza").show();
					}else if (risposta == 0){
						alert("La stazione di partenza da te inserita non risulta essere presente nel nostro database. Verifica di averla inserita correttamente.");
					}else if(risposta == 1) {
						alert("La stazione di destinazione da te inserita non risulta essere presente nel nostro database. Verifica di averla inserita correttamente.");
					}
				});
			}
		});

		$("#goToRisultatiPart").click(function(){
			$.post("biglietteria-ricerca.php", { 
				tipoRicerca: 1, 
				partenza: $('#partenza').val(), 
				destinazione: $('#destinazione').val(),
				dataPartenza: $('#dataPartenza').val(), 
				fasciaOrariaPart: $('#fasciaOrariaPartenza').val()
				}, 
				function(risposta) {
					$('#boxRisultatiAndata').html(risposta);
					giornoAndata = $('#dataPartenza').val();

			});

			$("#form2").slideUp(1500);
			$("#risultatiAndata").slideDown(1500);
			if(document.ricerca.ar.checked) $("#goToForm3").show();
			else $("#goToCheckOut").show();
		});

		$("#goToCheckOut").click(function(){
			if(andataSelezionata == -1) {
				alert("Seleziona un risultato prima di poter proseguire con il checkout");
			} else {
				alert("prezzoAndata: " + prezzoAndata + " -- codViaggio: " + andataSelezionata + " -- partenza: " + partenza + "-- destinazione: " + destinazione + " -- giornoAndata: " + giornoAndata + " -- orarioAndata: " + orarioAndata);
				$.post("admissionOrder.php", {  
					prezzoAndataA: prezzoAndata,
					codViaggioA: andataSelezionata,
					partenzaA: partenza,
					destinazioneA: destinazione,
					giornoAndataA: giornoAndata,
					orarioAndataA: orarioAndata,
					operatoreAndataA: operatoreAndata
				}, 
				function(risposta) {
					alert(risposta);
					window.location="shoppingcart.php";
				});
			}
		});


		$("#goToForm3").click(function(){
			if(andataSelezionata == -1) {
				alert("Seleziona un risultato prima di poter proseguire con il checkout");
			} else {
				andataConfermata = 1;
				$("#risultatiAndata").slideUp(1500);
				$("#form3").slideDown(1500);
			}
		});

		$("#goToRisultatiDest").click(function(){
			$.post("biglietteria-ricerca.php", { 
				tipoRicerca: 1, 
				partenza: $('#destinazione').val(), 
				destinazione: $('#partenza').val(),
				dataPartenza: $('#dataRitorno').val(), 
				fasciaOrariaPart: $('#fasciaOrariaRitorno').val()
				}, 
				function(risposta) {
					$('#boxRisultatiRitorno').html(risposta);
					giornoRitorno = $('#dataRitorno').val();
			});
			$("#form3").slideUp(1500);
			$("#risultatiRitorno").slideDown(1500);
		});

		$("#goToCheckOut2").click(function() {
			if(ritornoSelezionato == -1) {
				alert("Seleziona un risultato prima di poter proseguire con il checkout");
			} else {
				$.post("admissionOrder.php", {  
					prezzoAndataA: prezzoAndata,
					codViaggioA: andataSelezionata,
					partenzaA: partenza,
					destinazioneA: destinazione,
					giornoAndataA: giornoAndata,
					orarioAndataA: orarioAndata,
					operatoreAndataA: operatoreAndata,
					prezzoRitornoR: prezzoRitorno,
					codViaggioR: ritornoSelezionato,
					giornoRitornoR: giornoRitorno,
					orarioRitornoR: orarioRitorno,
					operatoreRitornoR: operatoreRitorno
				}, 
				function(risposta) {
					window.location="shoppingcart.php";
				});
			}
		});


		function selected_button(btn){
			if(andataConfermata == -1){
				if(andataSelezionata != -1){
					
					var cardid = "#card"+andataSelezionata;
					$(cardid).addClass("bg-light");
					$("#collapseResult"+andataSelezionata).css('background-color', '');
					$("#cardCollapse"+id).css('background-color', '');
					$("#"+andataSelezionata).html("Seleziona treno");
					$("#"+andataSelezionata).prop("disabled",false);
					$("#"+andataSelezionata).removeClass("btn-success");
					$("#"+andataSelezionata).addClass("btn-primary");

				}
				id = btn.id;
				var cardid = "#card"+id;
				$(cardid).removeClass("bg-light");
				$(cardid).css('background-color', '#cce0ff');
				$("#cardCollapse"+id).css('background-color', '#e6f0ff');
				$("#"+id).html("Selezionato");
				$("#"+id).prop("disabled",true);
				$("#"+id).removeClass("btn-primary");
				$("#"+id).addClass("btn-success");
				andataSelezionata = id;
				orarioAndata = $("#orarioPart"+id).text();
				prezzoAndata = $("#prezzo"+id).text();
				operatoreAndata = $("#operatore"+id).text();

			} else if(andataConfermata == 1){
				if(ritornoSelezionato != -1){
					
					var cardid = "#card"+ritornoSelezionato;
					$(cardid).addClass("bg-light");
					$("#collapseResult"+ritornoSelezionato).css('background-color', '');
					$("#cardCollapse"+id).css('background-color', '');
					$("#"+ritornoSelezionato).html("Seleziona treno");
					$("#"+ritornoSelezionato).prop("disabled",false);
					$("#"+ritornoSelezionato).removeClass("btn-success");
					$("#"+ritornoSelezionato).addClass("btn-primary");

				}
				id = btn.id;
				var cardid = "#card"+id;
				$(cardid).removeClass("bg-light");
				$(cardid).css('background-color', '#cce0ff');
				$("#cardCollapse"+id).css('background-color', '#e6f0ff');
				$("#"+id).html("Selezionato");
				$("#"+id).prop("disabled",true);
				$("#"+id).removeClass("btn-primary");
				$("#"+id).addClass("btn-success");
				ritornoSelezionato = id;
				orarioRitorno = $("#orarioPart"+id).text();
				prezzoRitorno = $("#prezzo"+id).text();
				operatoreRitorno = $("#operatore"+id).text();
			}
			
		}
		$("#goBackB1").click(function(){
			$("#form").fadeOut("fast",function(){
				$("#selezioneProdotto").fadeIn(1500);
			});
		});
		$("#goBackB2").click(function(){
			$("#form2").fadeOut("fast",function(){
				$("#form").fadeIn(100, function() {
					$("#istruzioni").fadeIn(100, function(){
					$("#step1").fadeIn(100);
					});
				});
			});
		});
		$("#goBackB3").click(function(){
			$("#risultatiAndata").fadeOut("fast",function(){
				$("#form2").fadeIn(100);
			});
		});
		
		$("#goBackB4").click(function(){
			$("#form3").fadeOut("fast",function(){
				$("#risultatiAndata").fadeIn(100);
			});
		});
		
		$("#goBackB5").click(function(){
			$("#risultatiRitorno").fadeOut("fast",function(){
				$("#form3").fadeIn(100);
			});
		});
				
		$("#abbonamento").click(function(){
			$("#selezioneProdotto").fadeOut("fast",function() { 
				$("#formAbb").fadeIn(100,function() {
					$("#istruzioniAbb").fadeIn(100,function() {
						$("#passo1").fadeIn(100);
					});
				});
			});
		});
		
		$("#goToPasso2").click(function(){
			if(document.abbonamento.stazione1.value != document.abbonamento.stazione2.value){
				$("#formAbb").slideUp(100);
				$("#formAbb2").slideDown(100);
			}
			else {alert("Hai inserito la stessa stazione nei campi 'Stazione 1' e  'Stazione 2' ");}
		});
		
		$("#goBackA1").click(function(){
			$("#formAbb").fadeOut("fast",function(){
				$("#selezioneProdotto").fadeIn(100);
			});
		});
		
		$("#goBackA2").click(function(){
			$("#formAbb2").fadeOut("fast",function(){
				$("#formAbb").fadeIn(100);
			});
		});
		

		function confronta_data(data1){
			data = data1.substr(6)+data1.substr(3,2)+data1.substr(0,2);
			if(data-getDate()<0) alert("Test");
		}
		
	</script>

	<script>
      $(document).ready(autocomplete(1));
    </script>

    
</body>
    


</html>
