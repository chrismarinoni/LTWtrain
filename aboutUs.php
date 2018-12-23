<?php
	include 'funzioni.php';
	include 'component/header.php';
	include 'component/footer.php';
?>




<!DOCTYPE html>
<html lang="it" dir="ltr">
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

		<title>Chi siamo - LTWtrain</title>

		<!-- Bootstrap core CSS -->
		<link href="css/bootstrap.min.css" rel="stylesheet">

		<!-- Custom styles for this template -->
		<link href="css/style.css" rel="stylesheet">
		<style>
			div#cambio1{background: url(images/trainguy.jpg); width:155px ; height :155px; display:block;}
			div:hover#cambio1{background: url(images/oldmn.jpeg);}
			div#cambio2{background: url(images/sonic.jpg); width:155px ; height :155px; display:block;}
			div:hover#cambio2{background: url(images/glasses.jpeg);}
		</style>

	</head>
	<body id ="body">
		<?php getHeader(); ?>
		
		<div class="p-3 p-md-5 text-black bg-splash" id="container">
			<div class="container" >
				<div class="row">
					<h2 class="display-3">Chi siamo</h2>
					<p class="lead my-3">Il lavoro qui presente &egrave; stato realizzato da due studenti dell'universit&agrave; "Sapienza" di Roma come progetto per il corso di Linguaggi e Tecnologie per il web:</p>
				</div>
				<div class="row mt-3">
					<div class="col-4 col-md-4">
					    <div id="cambio1"></div>
						<p style="font-size: 1.3rem">Christian Marinoni</p>
					</div>
					<div class="col-4 col-md-4">
						<div id="cambio2"></div>
						<p style="font-size: 1.3rem">Yuri Munno</p>
					</div>
					<div class="col-4">
						<h4> Contatti: </h4>
						<ul class="list-unstyled">
							<li class="mb-3 mt-3">marinoni.1745754 [at] studenti.uniroma1.it</li>
							<li>munno.1744303 [at] studenti.uniroma1.it</li>
							
						
						</ul>
					</div>
				</div>
				<div class="row">
					<h2 class="display-5 mt-5">Perch&eacute; un sito di "treni"</h2>
					<p class="lead my-3">Spendiamo ogni giorno circa 2 ore in treno per percorrere i 50 chilometri che separano la citt&agrave; in cui risiediamo (Ladispoli) alla sede universitaria. Realizzare un sito per l'acquisto di biglietti del treno ci &egrave; sembrata subito la scelta migliore.</p>
				</div>
				<div class="row">
					<h2 class="display-5 mt-5">Repository e linguaggi utilizzati</h2>
					<p class="lead my-3">Per realizzare il progetto sono stati utilizzati i seguenti linguaggi e librerie: HTML, PHP, js,  jQuery, Bootstrap, MySql, Python* (*per produrre le query per popolare il database)</p>
					<p class="lead my-3">&Egrave; disponibile una <a href="https://github.com/chrismarinoni/LTWtrain">repository su GitHub</a> contenente tutto il codice del progetto.</p>
				</div>
			</div>

		</div>
		
		<div id="wrap">
		</div>

		<?php getFooter(); ?>
		
	
	</body>	

</html>
