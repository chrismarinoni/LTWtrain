<?php
  include '../funzioni.php';
  $partenza = $_POST['partenza'];
  $destinazione = $_POST['destinazione'];
  $data = $_POST['data'];
  $mysqlDb = new MysqlFunctions;
  $connection = $mysqlDb->connetti();
  // echo("<b>DEBUG MSG:</b><br />Connesso correttamente al database <br/>");
  $query = 'SELECT * FROM treni WHERE stazionePartenza= "'.$partenza.'" AND stazioneArrivo="'.$destinazione.'"';
  $result = mysql_query($query, $connection) or die('Errore...');
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

     <!-- <script type="text/javascript" lang="javascript" scr="js/searchScript.js"></script>

     <script>
       window.onload = function() {setParameters();}
       window.onscroll = function() {fixBox();}
     </script> -->

   </head>

   <body id="body">

     <header id="nav" >
       <nav class="navbar navbar-expand-md navbar-dark fixed-top bg-red"  >
         <div class="container" >
           <a class="navbar-brand" href="#">LTWtrain</a>
           <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
             <span class="navbar-toggler-icon"></span>
           </button>
           <div class="collapse navbar-collapse" id="navbarCollapse">
             <ul class="navbar-nav mr-auto">
               <li class="nav-item">
                 <a class="nav-link" href="">Home </a>
               </li>
               <li class="nav-item">
                 <a class="nav-link" href="biglietteria.html">Biglietteria</a>
               </li>
               <li class="nav-item">
                 <a class="nav-link" href="tabellone.html">Tabellone</a>
               </li>
             </ul>
             <button class="btn btn-light" type="login">Area personale</button>
           </div>
         </div>
       </nav>
     </header>

     <div class="container mt-4 mb-4">
       <p style="font-size: 1.3rem;">Ricerca per partenza da <strong><?php echo($partenza); ?></strong> e arrivo a <strong><?php echo($destinazione); ?></strong> il <strong><?php echo($data); ?></strong></p>
     </div>
     <div class="container">
       <?php
          $i = $numRes-1;
          while($i > -1) {

            $orarioPart =  $dividi = explode(":",explode(" ",mysql_result($result, $i, "orarioPart"))[1])[0].":".explode(":",explode(" ",mysql_result($result, $i, "orarioPart"))[1])[1];
            $orarioArrivo =  $dividi = explode(":",explode(" ",mysql_result($result, $i, "orarioArrivo"))[1])[0].":".explode(":",explode(" ",mysql_result($result, $i, "orarioPart"))[1])[1];
            $durataViaggio = mysql_result($result, $i, "durataViaggio");
            $tipoTreno = mysql_result($result, $i, "tipoTreno");
            $prezzo = mysql_result($result, $i, "prezzo");

            echo("<div class='card bg-light mb-4'>
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
               <strong style='font-size: 1.2rem;'>".$orarioArrivo."</strong></span>
              </div>
              <div class='col-md-2 text-center mt-1 mb-1 result-box'>
                Durata <strong>".$durataViaggio."</strong>
              </div>
              <div class='col-md-2 text-center mt-1 mb-1 result-box'>".$tipoTreno."</div>
              <div class='col-md-2 text-center mt-1 mb-1 result-box'>
                <span>da<strong style='font-size:1.5rem;'>".$prezzo."€</strong></span></div>
                <div class='col-md-1 text-center mt-1 mb-1 result-box'>
                  <img id='arrow-down' src='https://static.thenounproject.com/png/551749-200.png' alt='' width='25px' height='21px'>
                </div>
              </div>
            </div>");
            $i--;
          }
        ?>
     </div>

   </body>
