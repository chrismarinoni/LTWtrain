<?php
    include '../component/header.php';
    include '../component/footer.php';
  $idUtente = $_SESSION['idUtente'];
  $nome = $_SESSION['nome'];
  $numBigliettiAcquistati = $_SESSION['numBigliettiAcquistati'];
  // $mysqlDb = new MysqlFunctions;
	// $connection = $mysqlDb->connetti();
	// $query = "SELECT * FROM utenti WHERE codUtente='".$codUtente."'";
	// $result = mysql_query($query, $connection) or die('Errore...');
	
	// $nome = mysql_result($result,0,"nome");
	// $numBigliettiAcquistati = mysql_result($result, 0, "numBigliettiAcquistati");
	// $abbonamento = mysql_result($result, 0, "abbonamento");
	
?>

<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="../../../../favicon.ico">

    <title>Profilo - LTWtrain</title>

    <!-- Bootstrap core CSS -->
    <link href="../css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="../css/style.css" rel="stylesheet">

    <script rel="text/javascript" lang="javascript" href="../js/signin_validation.js"></script>

  </head>

  <body>
    
    <!-- HEADER -->
    <?php getHeader(); ?>
    

    
	<!-- <div class="jumbotron">
		<div class="container">
			<h1 class="display-4"><?php echo($nome); ?> questo è il tuo profilo</h1>
			<p class="lead">Benvenuto nella tua area personale</p>
			<hr class="my-4">
			<p>Al momento hai acquistato <?php echo($numBigliettiAcquistati); if($numBigliettiAcquistati==1) echo(" biglietto"); else echo(" biglietti"); ?>. <?php if($numBigliettiAcquistati == 0) echo("Raggiungi l'area \"biglietteria\" ed acquista il tuo primo biglietto"); else echo("Nell'area biglietteria puoi acquistare nuovi biglietti."); ?></p>
			<a class="btn btn-primary btn-lg" href="../bigliettera.php" role="button">Acquista un biglietto</a>
		</div>
	</div> -->

    <div class="container mt-4">
      <h1><?php echo($nome); ?> questo è il tuo profilo</h1>
      <h3>Informazioni personali</h3>
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
