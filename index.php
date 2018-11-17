<?php
  include 'funzioni.php';
  $mysqlDb = new MysqlFunctions;
  $connection = $mysqlDb->connetti();
  // echo("<b>DEBUG MSG:</b><br />Connesso correttamente al database <br/>");
  $query = "SELECT nome FROM stazioni WHERE true";
  $result = mysql_query($query, $connection) or die('Errore...');

  $stazioni = mysql_fetch_array($result);
  // $codStazione = mysql_result($result, 0, "codStazione");
  // $nomeStazione = mysql_result($result, 0, "nome");
  // echo("Test1: ".$codStazione." ".$nomeStazione);



  // if (isset($_POST['search'])) {
	// 	// $response = "<ul><li>Nessuna corrispondenza</li></ul>";
  //
	// 	//$connection2 = new mysqli('localhost', 'ltwtrain', '', 'my_ltwtrain');
	// 	$q = $_POST['q'];
	// 	//$sql = $connection->query("SELECT `nome` FROM `stazioni` WHERE `nome` LIKE %$q%'");
  //   $sql = mysql_query("SELECT nome FROM stazioni WHERE nome LIKE '%$q%'");
  //   $num = mysql_numrows($sql);
  //   if ($num > 0) {
	// 		// $response = "<ul class='result'>";
  //     $i = $num-1;
	// 		while ($i > -1) {
	// 			$response .= '<div class="autocomplete-items">' . mysql_result($sql, $i, "nome") . "</div>";
	// 		  // $response .= "</ul>";
  //       $i--;
  //     }
	// 	}
  //
  //
	// 	exit($response);
	// }
  //$mysqlDb->disconnetti();
?>

<!DOCTYPE html>
<html lang="it" dir="ltr">

  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="../../../../favicon.ico">

    <title>LTWtrain</title>

    <!-- Bootstrap core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="css/style.css" rel="stylesheet">

    <!-- <script type="text/javascript" lang="javascript" scr="js/searchScript.js"></script>

    <script>
      window.onload = function() {setParameters();}
      window.onscroll = function() {fixBox();}
    </script> -->

    <script type="text/javascript" lang="javascript" src="js/autocomplete.js"></script>

  </head>


  <body id="body" onload="setParameters();" onscroll="fixBox();">

    <header id="nav" >
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

    <div class="p-3 p-md-5 text-black bg-splash">
      <div class="container">
        <div class="row">
          <div class="col-md-6">
            <h1 class='display-4 font-italic'>Il tuo prossimo viaggio in treno comincia qui.</h1>
            <p class="lead my-3">Ordina biglietti, controlla il tabellone degli orari, gestisci i tuoi viaggi dall'area privata.</p>
          </div>
          <div class="col-md-6">
            <img class="img-responsive splash d-md-none" src="images/train-home.jpg" alt="">
            <img class="img-responsive splash d-none d-lg-block img-bottom" src="images/train-home.jpg" alt="">
            <img class="img-responsive splash d-none d-md-block d-lg-none img-bottom" src="images/train-home-sc.jpg" alt="">
          </div>
        </div>
      </div>
    </div>


    <div class="search" id="search-to-fix">
      <div class="container">
        <form action="order/ricerca.php" method="post">
          <div class="row">
            <div class="col-md-3 col-sm-6 col-6">
              <h5 class="lead text-light">Partenza:</h5>

                <input name="partenza" class="form-control" type="text" placeholder="es. Roma" id="partenza">
                <div class="autocomplete" id="autocomplete">

                </div>
              <!-- <div id="response" class="autocomplete"></div> -->
            </div>
            <div class="col-md-3 col-sm-6 col-6">
              <h5 class="lead text-light">Destinazione:</h5>
              <input name="destinazione" class="form-control" type="text" placeholder="es. Milano" id="arrivo">
            </div>
            <div class="col-md-3 col-sm-6 col-6">
              <h5 class="lead text-light">Data:</h5>
              <input name="data" class="form-control is-datetime" type="date" placeholder="es. 01/11/2018" >
            </div>
            <div class="col-md-3 col-sm-6 col-6 ">
              <button class="btn btn-primary search-button" type="submit" >Cerca</button>
              <!-- <button class="btn btn-primary search-button" type="login">Cerca</button> -->
            </div>
          </div>
        </form>
      </div>
    </div>

    <div class="album py-5 bg-light">
      <div class="container">
        <h3 class="mb-5">Destinazioni consigliate</h3>
        <div class="row">

          <div class="col-md-4">
            <div class="card mb-4 shadow-sm">
              <img class="card-img-top" src="https://www.settemuse.it/viaggi_italia_campania/NA_napoli_citta/foto_napoli_004.jpg" alt="Card image cap">
              <div class="card-body">
                <div class="row">
                  <div class="col-md-6">
                    <h4 class="card-title">Napoli</h4>
                    <p class="card-text">Andata e ritorno</p>
                  </div>
                  <div class="col-md-6" >
                    <p class="card-text mr-3" style="position:absolute; right:0;">DA <span class="font-weight-bold " style="font-size:2rem;">19€</span></p>
                  </div>
                </div>
                <div class="d-flex justify-content-between align-items-center">
                  <div class="btn-group">
                    <button type="button" class="btn btn-sm btn-outline-secondary">View</button>
                  </div>
                </div>
              </div>
            </div>
          </div>

          <div class="col-md-4">
            <div class="card mb-4 shadow-sm">
              <img class="card-img-top" src="https://abitarearoma.it/wp/wp-content/uploads/2018/04/Fori-Imperiali-Pedonali-508x381.jpg" alt="Card image cap">
              <div class="card-body">
                <div class="row">
                  <div class="col-md-6">
                    <h4 class="card-title">Roma</h4>
                    <p class="card-text">Andata e ritorno</p>
                  </div>
                  <div class="col-md-6" >
                    <p class="card-text mr-3" style="position:absolute; right:0;">DA <span class="font-weight-bold " style="font-size:2rem;">19€</span></p>
                  </div>
                </div>
                <div class="d-flex justify-content-between align-items-center">
                  <div class="btn-group">
                    <button type="button" class="btn btn-sm btn-outline-secondary">View</button>
                  </div>
                </div>
              </div>
            </div>
          </div>


          <div class="col-md-4">
            <div class="card mb-4 shadow-sm">
              <img class="card-img-top" src="http://www.fiaf.net/agoradicult/wp-content/uploads/2016/12/02AAndreini-Isola-Porta-Volta-2.jpg" alt="Card image cap">
              <div class="card-body">
                <div class="row">
                  <div class="col-md-6">
                    <h4 class="card-title">Milano</h4>
                    <p class="card-text">Andata e ritorno</p>
                  </div>
                  <div class="col-md-6" >
                    <p class="card-text mr-3" style="position:absolute; right:0;">DA <span class="font-weight-bold " style="font-size:2rem;">15€</span></p>
                  </div>
                </div>
                <div class="d-flex justify-content-between align-items-center">
                  <div class="btn-group">
                    <button type="button" class="btn btn-sm btn-outline-secondary">View</button>
                  </div>
                </div>
              </div>
            </div>
          </div>

        </div>
      </div>
    </div>


    <section class="jumbotron">
      <div class="container md-4">
        <h1 class="jumbotron-heading">Abbonamenti</h1>
        <p class="lead text-muted">Acquista il tuo abbonamento online e risparmi il 15%. Puoi gestirlo nella tua area personale e rinnovarlo quando vuoi.</p>
        <p>
          <a href="#" class="btn btn-primary my-2">Acquista abbonamento</a>

        </p>
      </div>
    </section>

    <div>
      <div class="container mb-5">
      <h3 class="mb-3">Tutte le destinazioni raggiunte</h3>
        <div class="row">
          <div class="col-md-4 col-6">
            <il>
              <li>Roma</li>
              <li>Milano</li>
            </il>
          </div>
          <div class="col-md-4 col-6">
            <il>
              <li>Torino</li>
              <li>Genova</li>
            </il>
          </div>
          <div class="col-md-4 col-6">
            <il>
              <li>Bologna</li>
              <li>Trieste</li>
            </il>
          </div>
          <div class="col-md-4 col-6">
            <il>
              <li>Firenze</li>
              <li>Napoli</li>
            </il>
          </div>
          <div class="col-md-4 col-6">
            <il>
              <li>Venezia</li>
              <li>Reggio Calabria</li>
            </il>
          </div>
          <div class="col-md-4 col-6">
            <il>
              <li>Campobasso</li>
              <li>Ladispoli</li>
            </il>
          </div>
        </div>
      </div>
    </div>

    <footer class="bg-red">
      <div class="container pt-4 pb-2 text-light">
        <div class="row">
          <div class="col-md-6">
            <h5 class="mb-4">LTWtrain</h5>
            <a class="text-light" href="chi-siamo.html"><p>Chi siamo</p></a>
            <a class="text-light" href="contatti.html"><p>Contatti</p></a>
          </div>
          <div class="col-md-6">
            <h5 class="mb-4">Sito ad esclusivo uso didattico.</h5>
            <p>Il sito è stato realizzato come progetto da presentare ad un corso di laurea. Le informazioni presenti sono totalmente inventate.</p>
          </div>
        </div>
      </div>
    </footer>

    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script
			  src="https://code.jquery.com/jquery-3.3.1.min.js"
			  integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8="
			  crossorigin="anonymous"></script>
    <!-- <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script> -->
    <!-- <script>window.jQuery || document.write('<script src="../assets/js/vendor/jquery-slim.min.js"><\/script>')</script> -->
    <script src="assets/js/vendor/popper.min.js"></script>
    <script src="js/bootstrap.min.js"></script>

    <script>

    var fixId, fixTop, navH, bodyId, fixH, topReached = 0;

    function setParameters() {
      fixId = document.getElementById("search-to-fix");
      fixTop = fixId.offsetTop;
      navId = document.getElementById("nav");
      navH = navId.clientHeight + navId.getBoundingClientRect().top;
      bodyId = document.getElementById("body");
      fixH = fixId.offsetHeight;
    }

    function fixBox() {
      if(window.pageYOffset >= (fixTop-navH)) {
        fixId.classList.add("fixed-search");
        fixId.style.top = navH + "px";
        bodyId.style.marginTop = fixH + "px";
        topReached=1;
      } else {
        fixId.classList.remove("fixed-search");
        if(topReached==1){
          fixId.style.top = 0 + "px";
          bodyId.style.marginTop = 0 + "px";
          topReached=0;
        }
      }
    }
    window.onload = function() {setParameters();}

    window.onscroll = function() {fixBox();}

    </script>

    <?php
    $serialized = "";
    for ($i = 0; $i < count($stazioni)-1; $i++) {
      if($i > 0) $serialized .= ",";
      $serialized .= "'" . $stazioni[$i] . "'";
    }

    echo '<script> var stazioni = [' . $serialized . ']; autocomplete(document.getElementById("partenza"),stazioni);</script>' ?>

    <!-- <script type="text/javascript" >
      autocomplete(document.getElementById("partenza"),['Ladispoli-Cerveteri']);
    </script> -->

    <!-- <script type="text/javascript">
      $(document).ready(function () {
            $("#partenza").keyup(function () {
                var query = $("#partenza").val();

                if (query.length > 1) {
                    $.ajax(
                        {
                            url: 'index.php',
                            method: 'POST',
                            data: {
                                search: 1,
                                q: query
                            },
                            success: function (data) {
                                console.log(data);
                                $("#response").html(data);
                            },
                            dataType: 'text'
                        }
                    );
                }
            });

            $(document).on('click', 'li', function () {
                var nomeStazione = $(this).text();
                $("#partenza").val(nomeStazione);
                $("#response").html("");
            });
        });

    </script> -->

  </body>
</html>
