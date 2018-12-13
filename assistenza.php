<?php 
  include 'component/header.php';
  include 'component/footer.php';
?>

<!DOCTYPE html>
	<html lang="it" dir="ltr">
	<head>
    	<meta charset="utf-8" />
    	<title>LTWtrain - Assistenza</title>
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    
		<link href="../css/bootstrap.min.css" rel="stylesheet">

		<link href="../css/style.css" rel="stylesheet">
	</head>
	<body>
		<?php getHeader(); ?>

		<div class="container mt-4">
			<form action="" method="post">
			
				<p>Inserire qui il titolo (es. 'Richiedi assistenza al nostro team')</p>

				<div class="col-md-6 mb-3">
					<label for="inputName">Nome</label>
					<input type="text" name="name" id="inputName" class="form-control" placeholder="Inserisci Nome" required autofocus > 
				</div>
				<div class="col-md-6 mb-3">
					<label for="inputSurname">Cognome</label>
					<input type="text" name="surname" id="inputSurame" class="form-control" placeholder="Inserisci Cognome" required  > 
				</div>
				<div class="col-md-6 mb-3">
					<label for="inputEmail">Email</label>
					<input type="email" name="email" id="inputEmail" class="form-control " placeholder="es.  gianluigi@qualcosa.com" required > 
				</div>
				<div class="col-md-6 mb-3">
					<label for="inputCell">Numero Telefonico</label>
					<input type="tel" name="cell" id="inputCell" class="form-control " placeholder="Inserisci Cellulare" required > 
				</div>
				<div class="col-md-6 mb-3">
					<label for="inputComment">Descrizione Problema</label>
					<textarea  name="comment" cols="80" rows="5" wrap="physical" id="inputComment" class="form-control" placeholder="Inserisci Testo.."  ></textarea>
				</div>
				<div class="col-md-6 mb-3">
					<label for="inputFile">Inserisci Allegato</label>
					<input type="file" name="file" id="inputFile" class="form-control" > 
				</div>
				<div class="col-md-6 mb-3">
					<button class="btn btn-primary" type="submit" >Invia</button>
				</div>
				
				
				
				
				
			</form>
		</div>

		<div id="wrap">
		</div>

		<?php getFooter(); ?>
	</body>
</html>
