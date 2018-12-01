<?php 
  include 'funzioni.php';
  include 'component/header.php';
  include 'component/footer.php';
?>

<!DOCTYPE html>
	<html lang="it" dir="ltr">
	<head>
    	<meta charset="utf-8" />
    	<meta http-equiv="X-UA-Compatible" content="IE=edge">
    	<title>LTWtrain - Assistenza</title>
    	<meta name="viewport" content="width=device-width, initial-scale=1">
    
		<link href="../css/bootstrap.min.css" rel="stylesheet">

		<link href="../css/style.css" rel="stylesheet">
</head>
<body id="body">
	<?php getHeader(); ?>
	<div class="container mt-4">
		<form action="" method="post">
			<div class="col-sm-3 col-md-6 col-6">
				<label for="inputName">Nome</label>
				<input type="text" name="name" id="inputName" class="form-control" placeholder="Inserisci Nome" required autofocus > 
			</div>
			<br>
			<div class="col-sm-3 col-md-6 col-6">
				<label for="inputSurname">Cognome</label>
				<input type="text" name="surname" id="inputSurame" class="form-control" placeholder="Inserisci Cognome" required  > 
			</div>
			<br>
			<div class="col-sm-3 col-md-6 col-6">
				<label for="inputEmail">Email</label>
				<input type="email" name="email" id="inputEmail" class="form-control " placeholder="es.  gianluigi@qualcosa.com" required > 
			</div>
			<br>
			<div class="col-sm-3 col-md-6 col-6">
				<label for="inputCell">Numero Telefonico</label>
				<input type="tel" name="cell" id="inputCell" class="form-control " placeholder="Inserisci Cellulare" required > 
			</div>
			<br>
			<div class="col-sm-3 col-md-6 col-6">
				<label for="inputComment">Descrizione Problema</label>
				<textarea  name="comment" cols="80" rows="5" wrap="physical" id="inputComment" class="form-control" placeholder="Inserisci Testo.."  ></textarea>
			</div>
			<br>
			<div class="col-sm-3 col-md-6 col-6">
				<label for="inputFile">Inserisci Allegato</label>
				<input type="file" name="file" id="inputFile" class="form-control" > 
			</div>
			<br>
			<div class="col-sm-3 col-md-6 col-6">
				
				<button class="btn btn-primary search-button" type="submit" >Invia</button>
			</div>
			
			
			
			
			 
		</form>
	</div>
	<?php getFooter(); ?>
</body>
