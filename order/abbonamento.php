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
		$stazione1= "Ladispoli-Cerveteri";
	$stazione2=$_POST['stazione2'];
	if ($stazione2=="romaTermini") 
				$stazione2= "Roma Termini";
	else if ($stazione2=="romaTiburtina")
				$stazione2= "Roma Tiburtina";
	
	else if ($stazione2=="milano")
				$stazione2= "Milano Centrale";	
	else if ($stazione2=="firenze")
				$stazione2= "Firenze Santa Lucia";
	else if ($stazione2=="napoli")
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
		$stazione2= "Ladispoli-Cerveteri";
	$giornoPartenza=$_POST['giornoPartenza'];
	$giorno=explode("-",$giornoPartenza);
	$giornoPartenza=$giorno[2]."/".$giorno[1]."/".$giorno[0];
	$tipoAbbonamento=$_POST['tipoAbbonamento'];
	if($tipoAbbonamento=="settimanale"){
		$tipoAbbonamento="Settimanale";
		$prezzo="50 ";
		if ($giorno[2]+7>30) {
			if ($giorno[1]==12){
				$giorno[2]=$giorno[2]+7-30;
				$giorno[1]=1;
				$giorno[0]=$giorno[0]+1;
			}
			$giorno[2]=$giorno[2]+7-30;
			$giorno[1]=$giorno[1]+1;
		}
		else
			$giorno[2]=$giorno[2]+7; 
	}
	else if($tipoAbbonamento=="mensile"){
		$tipoAbbonamento="Mensile";
		$prezzo="100 ";
		if(giorno[1]==12){
			$giorno[1]=1;
			$giorno[0]=$giorno[0]+1;
		}
		else
			$giorno[1]=$giorno[1]+1;
	}
	else if($tipoAbbonamento=="stagionale"){
		$tipoAbbonamento="Stagionale";
		$prezzo="150 ";
		if ($giorno[1]+3>12){
			$giorno[1]=$giorno[1]-9;
			$giorno[0]=$giorno[0]+1;
		}
		else
			$giorno[1]=$giorno[1]+3;
	}
	else if($tipoAbbonamento=="semestrale"){
		$tipoAbbonamento="Semestrale";
		$prezzo="200 ";
		if ($giorno[1]+6>12){
			$giorno[1]=$giorno[1]-6;
			$giorno[0]=$giorno[0]+1;
		}
		else
			$giorno[1]=$giorno[1]+6;
	}
	else if($tipoAbbonamento=="scolastico"){
		$tipoAbbonamento="Scolastico";
		$prezzo="250 ";
		if ($giorno[1]+9>12){
			$giorno[1]=$giorno[1]-3;
			$giorno[0]=$giorno[0]+1;
		}
		else
			$giorno[1]=$giorno[1]+9;
	}
	else {
		$tipoAbbonamento="Annuale";
		$prezzo="300 ";
		$giorno[0]=$giorno[0]+1;
	}
	$giornoScadenza=$giorno[2]."/".$giorno[1]."/".$giorno[0];
	
	
?>
<!DOCTYPE html>
<html lang="it" dir="ltr">
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no ">
		<meta name="description" content="">
		<meta name="author" content="">
		<title>Abbonamento - LTWtrain</title>
		 <!-- Bootstrap core CSS -->
		<link href="../css/bootstrap.min.css" rel="stylesheet">

		<!-- Custom styles for this template -->
		<link href="../css/style.css" rel="stylesheet">
		
		
	</head>
	<body id="body">
	<?php getHeader(); ?>
	<div class="container" id="container">
			<h3 class="mt-5">Informazioni sul tuo abbonamento </h3>
			<div class="row mt-5">
				<div class= "col-sm-3 col-md-6 col-6">
					<h5>Stazione 1</h5>
					<?php echo($stazione1) ?>
				</div>
				<div class= "col-sm-3 col-md-6 col-6">
					<h5>Stazione 2</h5>
					<?php echo($stazione2) ?>
				</div>
			</div> 
			<div class="row mt-5">
				<div class="col-sm-3 col-md-6 col-6">
					<h5>Data inizio abbonamento</h5>
					<?php echo($giornoPartenza) ?>
				</div>
				<div class="col-sm-3 col-md-6 col-6">
					<h5>Data scadenza abbonamento</h5>
					<?php echo($giornoScadenza) ?>
				</div>
				
			</div>
			<div class="row mt-5">
				<div class="col-sm-3 col-md-6 col-6">
					<h5>Tipo abbonamento</h5>
					<?php echo($tipoAbbonamento) ?>
				</div>
				<div class="col-sm-3 col-md-6 col-6">
					<h5>Prezzo listino</h5>
					<?php echo($prezzo."€") ?>
				</div>
				
			</div>
			<?php
				echo("<button type='button' class='btn btn-primary btn-lg mt-5' id='stampaPdf' onClick='pdf(\"".$stazione1."||".$stazione2."||".$giornoPartenza."||".$giornoScadenza."||".$tipoAbbonamento."||".$prezzo."\");'>Stampa abbonamento</button>")
			?>
	</div>
		
	
	<div id="wrap">

	</div>
	

	<?php getFooter(); ?>
	

	<script
			  src="https://code.jquery.com/jquery-3.3.1.min.js"
			  integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8="
			  crossorigin="anonymous"></script>
    <!-- <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script> -->
    <!-- <script>window.jQuery || document.write('<script src="../assets/js/vendor/jquery-slim.min.js"><\/script>')</script> -->
    <script src="../assets/js/vendor/popper.min.js"></script>
    <script src="../js/bootstrap.min.js"></script>

	
	<script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/1.4.1/jspdf.debug.js" integrity="sha384-THVO/sM0mFD9h7dfSndI6TS0PgAGavwKvB5hAxRRvc0o9cPLohB0wb/PTA7LdUHs" crossorigin="anonymous"></script>

	<script src="https://cdnjs.cloudflare.com/ajax/libs/jsbarcode/3.11.0/barcodes/JsBarcode.code128.min.js"></script>
  
    <script>
      function textToBase64Barcode(text){
        var canvas = document.createElement("canvas");
        JsBarcode(canvas, text, {
          format: "CODE128",
          displayValue: "false",
          background: "#E6F0FF"
          });
        return canvas.toDataURL("image/png");
      }
	</script>

	<script>	
		
		function pdf(ticket) {

			var ticket = ticket.split("||");
			
			var station1= ticket[0];
			var station2= ticket[1];
			var inizio=ticket[2];
			var scadenza=ticket[3];
			var abb=ticket[4];
			var price=ticket[5];
			var priceDiscount = price - (price/100)*15;
			
			var doc= new jsPDF();
			doc.setFontSize(20);
			doc.setFont('helvetica');
			doc.setFontType('bolditalic');
			doc.text("LTWtrain", 10, 15);

			doc.setDrawColor(108,117,125);
			// doc.setFillColor(248,249,250);
			doc.setFillColor(230, 240, 255);
			doc.roundedRect(10,25,190, 80, 5, 5, 'FD');

			doc.setFillColor(204, 224, 255);
			doc.rect(10.5,56,189, 20, 'F');

			var imgData = 'data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAgAAAAIACAMAAADDpiTIAAADAFBMVEUAAAAAAAB/f39VVVU/Pz9mZmZVVVVISEg/Pz9UVFRMTExFRUVVVVVOTk5ISEhVVVVPT09LS0tGRkZQUFBMTExISEhRUVFNTU1KSkpRUVFOTk5LS0tISEhPT09MTExKSkpPT09NTU1LS0tQUFBNTU1LS0tJSUlOTk5MTExKSkpOTk5NTU1LS0tPT09NTU1LS0tKSkpOTk5MTExLS0tOTk5MTExLS0tOTk5NTU1MTExPT09NTU1MTExLS0tOTk5MTExLS0tOTk5NTU1MTExOTk5NTU1MTExLS0tNTU1MTExLS0tOTk5NTU1MTExOTk5NTU1MTExLS0tNTU1MTExLS0tOTk5NTU1MTExOTk5NTU1MTExLS0tNTU1MTExLS0tNTU1NTU1MTExOTk5NTU1MTExLS0tNTU1MTExMTExNTU1MTExMTExNTU1NTU1MTExOTk5NTU1MTExMTExNTU1MTExMTExNTU1NTU1MTExNTU1NTU1MTExMTExNTU1MTExMTExNTU1NTU1MTExNTU1NTU1MTExMTExNTU1MTExMTExNTU1NTU1MTExNTU1NTU1MTExMTExNTU1MTExMTExNTU1NTU1MTExNTU1NTU1MTExNTU1NTU1LS0tMTExNTU1LS0tMTExNTU1NTU1MTExNTU1NTU1LS0tMTExNTU1LS0tMTExNTU1NTU1MTExNTU1NTU1LS0tMTExNTU1LS0tMTExNTU1NTU1MTExNTU1NTU1LS0tMTExNTU1LS0tMTExNTU1NTU1MTExNTU1NTU1LS0tMTExNTU1LS0tMTExNTU1NTU1MTExNTU1NTU1LS0tNTU1NTU1LS0tMTExNTU1LS0tLS0tNTU1NTU1LS0tNTU1NTU1LS0tMTExNTU1LS0tLS0tNTU1NTU1LS0tNTU1NTU1LS0tMTExNTU1LS0tLS0tNTU1NTU1LS0tNTU1NTU1LS0tMTExNTU1LS0tLS0tNTU1NTU1LS0tNTU1NTU1LS0tMTExNTU1LS0tLS0tNTU1NTU1DE8j9AAAA/3RSTlMAAQIDBAUGBwgJCgsMDQ4PEBESExQVFhcYGRobHB0eHyAhIiMkJSYnKCkqKywtLi8wMTIzNDU2Nzg5Ojs8PT4/QEFCQ0RFRkdISUpLTE1O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hr5FoAQM0yKKdiBT8YFbKGX/qEpQAohpGl0Mx1UxnVZaKePcR/eaoASS/IvpqgIuMTeak0gZ6V+3i4ISUMydD9PVGgC3jj9MKX/0KwIlsJR7Yy+1tCg+YDOlHBh9C5QAEz3VQk0pKy2UcX7GfSYogSbuV+YEy7L20VAC0NfMAX88VxRKQGrLa3ZwTGUogep3XpuEmQ1MUAJWSV4Ly/IO0VACWVP6buPzxaAEuLb00cGxVaAEvsb0RcKshiYowaConbIs33SMgRIsfqacTf2LQQkiz1DCoXFVoASXAqnUKXH2/SYoQWch9bCu6BQDJRg9Su82DygOJUhFnKJnh8dXhRLE3qUHiXMamaEEtTvpjnVlpzxQgt4uatoysASUUPAkXR2ZcCuUEGH+kc4ufNzYDCV0FN7KLNZVXfJACS15Z9h51dYXSkAJQVUmrI8/8uuYalAURVEURVEURVEURVEURVEURVEURVEURVEURVEURVEURVEURVEURVEURVEURVEURVEURVEURVEURVEURVEURVEURVEURVEURVEURVEURVEURVEURVEURVEURQkd/wdiF14DBD+3bwAAAABJRU5ErkJggg==';
			doc.addImage(imgData, 'PNG', 157, 23, 40, 40);
        
			var barcode = textToBase64Barcode(abb+""+price);
        	doc.addImage(barcode, 'PNG', 138, 93, 60, 10);
        
			doc.setFont('times');
			doc.setFontType('italic');
			doc.setFontSize(25);
			doc.text("ABBONAMENTO - voucher richiesta", 15, 37);
			doc.setFontType('italic');
			doc.setFontSize(15);
			doc.text("valido dal "+inizio+"  al "+scadenza, 15, 43);

			doc.setFont('helvetica');
			doc.setFontType('normal');
			doc.setFontSize(13);
			doc.text("Stazione1", 15, 61);

			doc.setFontType('bold');
			doc.setFontSize(15);
			doc.text(""+station1, 15, 67);
		
			doc.setFontType('bolditalic');
			doc.setFontSize(13);
			doc.text("prezzo: "+priceDiscount+" euro incluso il 15% di sconto (prezzo originale: " + price + "euro)", 15, 73);

				
			doc.setFontType('normal');
			doc.setFontSize(13);
			doc.text("Stazione2", 67, 61);

			doc.setFontType('bold');
			doc.setFontSize(15);
			doc.text(""+station2, 67, 67);
        
			
			doc.setFontType('bold');
			doc.setFontSize(18);
			doc.text("Modalità di acquisto", 15, 120);

			doc.setFontType('bold');
			doc.setFontSize(12);
			doc.text("Per procedere all'acquisto di un abbonamento è necessario presentare questo voucher \nalle biglietterie delle principali stazioni italine. Verrà applicato alle casse lo sconto del 15% \nsul prezzo nominale dell'abbonamento.", 15, 126);
        
			doc.text("Per poter ritirare il titolo di viaggio è necessario presentare una fotocopia della \ncarta d'indentità ed una fototessera. Il titolo di viaggio sarà prodotto al momento dall'opera- \ntore e sarà valido dal giorno specificato al momento dell'acquisto su questo sito.", 15, 142);

			doc.text("Il voucher qui presente può essere utilizzato per l'attivazione dell'abbonamento se\npresentato alla biglietteria entro 10 giorni a partire dall'inizio nominale dell'eventuale\nabbonamento (entro 10 giorni a partire dal "+inizio+"). Superati i 10 giorni il voucher\nnon potrà essere utilizzato.", 15, 160);

			doc.text("Una volta attivato l'abbonamento non sarà possibile richiedere rimborso.", 15, 183);

			doc.save("Abbonamento"+(Math.floor(Math.random()*9999)+1111)+'.pdf');
	}
        
	
		
	</script>
				
							

	</body>
</html>
