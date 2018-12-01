<?php
  include '../funzioni.php';
  include '../component/header.php';
  include '../component/footer.php';
  session_start();

  $idUtente = $_SESSION["idUtente"];

  if($_SESSION['acquistoInCorso'] == 1 && $_SESSION['codViaggio'] != "" && $_SESSION['accountFilled'] == 1)
    header("location: ../order/checkout.php");
  else if($_SESSION['acquistoInCorso'] == 1 && $_SESSION['codViaggio'] != "" && $_SESSION['accountFilled'] == 0)
    header("location: accountComplete.php");
  else if($idUtente ==""){
    header("location: signin.html");
  }
  $nome = $_SESSION['nome'];
  $cognome = $_SESSION['cognome'];
  $numBigliettiAcquistati = $_SESSION['numBigliettiAcquistati'];
  $abbonamento = $_SESSION['abbonamento'];
?>

<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="../../../../favicon.ico">

    <title>Login - LTWtrain</title>

    <!-- Bootstrap core CSS -->
    <link href="../css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="../css/style.css" rel="stylesheet">

    <script rel="text/javascript" lang="javascript" href="../js/signin_validation.js"></script>

  </head>

  <body>
    
    <!-- HEADER -->
    <?php getHeader(); ?>
	
	<div class="jumbotron">
		<div class="container">
      <?php if($_SESSION['accountFilled'] == 0) echo("<div class='alert alert-danger' role='alert'>Completa l'account per poter effetture acquisti. Clicca <a href='accountComplete.php'> QUI </a></div>"); ?>
			<h1 class="display-4">Ciao, <?php echo($nome); ?>!</h1>
			<p class="lead">Benvenut<?php if($_SESSION['sesso']=="F") echo("a");else echo("o"); ?> nella tua area personale</p>
			<hr class="my-4">
			<p>Al momento hai acquistato <?php echo($numBigliettiAcquistati); if($numBigliettiAcquistati==1) echo(" biglietto"); else echo(" biglietti"); ?>. <?php if($numBigliettiAcquistati == 0) echo("Raggiungi l'area \"biglietteria\" ed acquista il tuo primo biglietto"); else echo("Nell'area biglietteria puoi acquistare nuovi biglietti."); ?></p>
			<a class="btn btn-primary btn-lg" href="../order/biglietteria.php" role="button">Acquista un biglietto</a>
		</div>
	</div>

    <div class="container mb-4">
      <h2>I tuoi biglietti</h2>
      <?php if($numBigliettiAcquistati==0) echo("<p>Al momento non ci sono biglietti acquistati</p>"); ?>
    </div>
    
    <div class="container mb-4">
		<h2>I tuoi abbonamenti</h2>
		<p>Al momento non ci sono abbonamenti acquistati</p>
    </div>

    <!-- FOOTER -->
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
	
  </body>
</html>
