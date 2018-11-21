<?php
	$codUtente = $_POST["codiceUtente"];
	$mysqlDb = new MysqlFunctions;
	$connection = $mysqlDb->connetti();
	// echo("<b>DEBUG MSG:</b><br />Connesso correttamente al database <br/>");
	$query = "SELECT * FROM utenti WHERE codUtente='".$codUtente."'";
	$result = mysql_query($query, $connection) or die('Errore...');
	
	$nome = mysql_result($result,0,"nome");
	$numBigliettiAcquistati = mysql_result($result, 0, "numBigliettiAcquistati");
	$abbonamento = mysql_result($result, 0, "abbonamento");
	
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
    <header id="nav">
      <nav class="navbar navbar-expand-md navbar-dark fixed-top bg-red"  >
        <div class="container" >
          <a class="navbar-brand" href="#">LTWtrain</a>
          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarCollapse">
            <ul class="navbar-nav mr-auto">
              <li class="nav-item active">
                <a class="nav-link" href="">Home <span class="sr-only">(current)</span></a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="order/biglietteria.php">Biglietteria</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="tabellone.html">Tabellone</a>
              </li>
            </ul>
            <a href="account/signin.php" class="btn btn-light" role="button" aria-pressed="true">Area Personale</a>
          </div>
        </div>
      </nav>
    </header>
	
	<div class="jumbotron">
		<div class="container">
			<h1 class="display-4">Ciao, <?php echo($nome); ?>!</h1>
			<p class="lead">Benvenuto nella tua area personale</p>
			<hr class="my-4">
			<p>Al momento hai acquistato <?php echo($numBigliettiAcquistati); if($numBigliettiAcquistati==1) echo(" biglietto"); else echo(" biglietti"); ?>. <?php if($numBigliettiAcquistati == 0) echo("Raggiungi l'area \"biglietteria\" ed acquista il tuo primo biglietto"); else echo("Nell'area biglietteria puoi acquistare nuovi biglietti."); ?></p>
			<a class="btn btn-primary btn-lg" href="../bigliettera.php" role="button">Acquista un biglietto</a>
		</div>
	</div>

    <div class="container mb-4">
      <h2>I tuoi biglietti</h2>
      <p>Al momento non ci sono biglietti acquistati</p>
    </div>
    
    <div class="container mb-4">
		<h2>I tuoi abbonamenti</h2>
		<p>Al momento non ci sono abbonamenti acquistati</p>
    </div>
  </body>
</html>
