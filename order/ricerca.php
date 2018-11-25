<?php
  include '../funzioni.php';
  include '../component/header.php';
  include '../component/footer.php';
  $partenza = $_POST['partenza'];
  $destinazione = $_POST['destinazione'];
  $data = $_POST['data'];
  $codUtente = $_POST['codUtente'];
  $mysqlDb = new MysqlFunctions;
  $connection = $mysqlDb->connetti();
  // echo("<b>DEBUG MSG:</b><br />Connesso correttamente al database <br/>");
  $query = "SELECT `codStazione` FROM `stazione` WHERE `nome` = '".$partenza."'";
  $result = mysql_query($query, $connection) or die('Errore accesso database [ERROR 1A3] ...');
  $codStPartenza = mysql_result($result,0,"codStazione");
  $query = "SELECT * FROM `stazione` WHERE `nome` = '".$destinazione."' ";
  $result = mysql_query($query, $connection) or die('Errore accesso database [ERROR 2A3] ...');
  $codStArrivo = mysql_result($result,0,"codStazione");
  $query = "SELECT * FROM `treno` AS t INNER JOIN `viaggio` AS v ON t.codTreno = v.codTreno INNER JOIN `collegamento` AS c ON v.codCollegamento = c.codCollegamento WHERE `codStPart` = '".$codStPartenza."' AND codStArr = '".$codStArrivo."' AND `dataViaggio` = '".$data."' ORDER BY orarioPart DESC";
  // $query = "SELECT * FROM `collegamento` WHERE `codStPart` = '".$codStPartenza."' AND codStArr = '".$codStArrivo."'";
  $result = mysql_query($query, $connection) or die('Errore accesso database [ERROR 3A3] ...');
  $numRes = mysql_numrows($result);
?>

 <!DOCTYPE html>
 <html lang="it" dir="ltr">

   <head>
     <meta charset="utf-8">
     <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
     <meta name="description" content="">
     <meta name="author" content="">
     <link rel="icon" href="../../../../favicon.ico">

     <title>Ricerca treni - LTWtrain</title>

     <!-- Bootstrap core CSS -->
     <link href="../css/bootstrap.min.css" rel="stylesheet">

     <!-- Custom styles for this template -->
     <link href="../css/style.css" rel="stylesheet">
     

   </head>

   <body id="body">

     <?php getHeader(); ?>

     <div class="container mt-4">
       <p style="font-size: 1.3rem;">Ricerca per partenza da <strong><?php echo($partenza); ?></strong> e arrivo a <strong><?php echo($destinazione); ?></strong> il <strong><?php echo($data); ?></strong></p>
     </div>
     <div class="container">
       <?php
          $i = $numRes-1;
          if($i == -1) {
            echo ("<p style='font-size: 1.4rem;'>Nessun risultato per la ricerca effettuata");
          }
          while($i > -1) {
            $dividiOrarioPart = explode(":", mysql_result($result, $i, "orarioPart"));
            $dividiOrarioArr = explode(":", mysql_result($result, $i, "orarioArr"));
            $orarioPart = $dividiOrarioPart[0].":".$dividiOrarioPart[1];
            $orarioArrivo = $dividiOrarioArr[0].":".$dividiOrarioArr[1];
            $durataViaggio = mysql_result($result, $i, "durata");
            $prezzo = mysql_result($result, $i, "prezzo");
            $dettagli = mysql_result($result, $i, "dettagli");
            $codCollegamento = mysql_result($result, $i, "codCollegamento");
            $tipoTreno = mysql_result($result, $i, "tipoTreno");
            $operatore = mysql_result($result, $i, "operatore");
            $dettagliConfort= explode("&&", mysql_result($result, $i, "dettagliTreno"));
            $giornoDopo = mysql_result($result, $i, "giornoDopo");
            if($giornoDopo == 1) $giornoDopo = "+1";
            else $giornoDopo = "";
            $confort = "";
            foreach ($dettagliConfort as $elem) {
              $confort .= "<li>".$elem."</li>";
            }
            $postiTotStandard = mysql_result($result, $i, "postiTotStandard");
            $postiOccupatiStandard = mysql_result($result, $i, "postiOccupatiStandard");
            $codTreno = mysql_result($result, $i, "codTreno");
            $postiDisponibili = $postiTotStandard - $postiOccupatiStandard;

            echo("<div class='card bg-light mt-4'>
            <div class='row mb-4 mt-4'>
              <div class='col-md-2 text-center mt-1 mb-1'>
                <span>".$partenza."<br />"."<strong style='font-size: 1.2rem;'>".$orarioPart."</strong></span>
              </div>
              <hr>
              <div class='col-md-1 mt-1 mb-1 result-box'>
                  <img src='https://cdn2.iconfinder.com/data/icons/harry-potter-colour-collection/60/28_-_Harry_Potter_-_Colour_-_Hogwarts_Express-512.png'  width='30px' height='30px' alt='' class='result-element'>
              </div>
              <div class='col-md-2 text-center mt-1 mb-1'>
                <span>".$destinazione."<br>
               <strong style='font-size: 1.2rem;'>".$orarioArrivo."<i> ".$giornoDopo."</i></strong></span>
              </div>
              <div class='col-md-2 text-center mt-1 mb-1 result-box'>
                Durata <strong>".$durataViaggio."</strong>
              </div>
              <div class='col-md-2 text-center mt-1 mb-1 result-box'>".$tipoTreno."</div>
              <div class='col-md-2 text-center mt-1 mb-1 result-box'>
                <span>da<strong style='font-size:1.5rem;'>".$prezzo."€</strong></span></div>
                <div class='col-md-1 text-center mt-1 mb-1 result-box'>
                  <a data-toggle='collapse' href='#collapseResult".$i."' role='button' aria-expanded='false' aria-controls='collapseResult".$i."' >
                  <img class='clickable' id='arrow-down' src='https://static.thenounproject.com/png/551749-200.png' alt='' width='25px' height='21px'>
				          </a>
                </div>
              </div>
            </div>
            <div class='collapse' id='collapseResult".$i."'>

              <div class='card card-body'>
                  <div class='row'>
                    <div class='col-md-5'>
                      <p>Operatore: <strong>".$operatore."</strong></p>
                      <p>Confort: <ul>".$confort."
                                  </ul></p>
                    </div>
                    <div class='col-md-5'>
                      <p>Tipologia Treno: <strong>".$tipoTreno."</strong></p>
                      <p>Codice Treno: ".$codTreno."</p>
                      <p>Tipologia viaggio: ".$dettagli."</p>
                      <p>Posti disponibili: <strong>".$postiDisponibili."</strong></p>
                    </div>
                    <div class='col-md-2'>
                    <a href='admissionOrder.php?codViaggio=".$codTreno."&partenza=".$partenza."&destinazione=".$destinazione."' class='btn btn-primary' role='button'>Prenota</a>
                    </div>
                  </div>
              </div>
		      	</div>");
            $i--;
          }
        ?>
     </div>
		
    <!-- <br>
    <br>
    <h3>TEST CARD CLICK</h3>
     <div class='card card-body'>
            <div class='row'>
              <div class='col-md-5'>
                <p>Operatore: <strong>Trenitalia</strong></p>
                <p>Confort: <ul>
                              <li>Wifi gratuito</li>
                              <li>Servizio di ristoro</li>
                            </ul></p>
              </div>
              <div class='col-md-5'>
                <p>Tipologia Treno: <strong>Frecciarossa 1000</strong></p>
                <p>Codice Treno: AR23931</p>
                <p>Tipologia viaggio: nessun cambio</p>
                <p>Posti disponibili: <strong>10</strong></p>
              </div>
              <div class='col-md-2'>
                <button>Ordina</button>
              </div>
            </div>
				</div> -->

      
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

<?php 

?>