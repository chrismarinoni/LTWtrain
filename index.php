<?php
  include 'component/header.php';
  include 'component/footer.php';
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

    <script type="text/javascript" lang="javascript" src="searchScript.js"></script>

    <script type="text/javascript" lang="javascript" src="js/autocomplete.js"></script>

    <script>
      window.onload = function() {setParameters();}
      window.onscroll = function() { fixBox(); }
    </script>


  </head>


  <body id="body">

    <!-- HEADER -->
    <?php getHeader(); ?>

    <div class="p-3 p-md-5 text-black bg-splash">
      <div class="container">
        <div class="row">
          <div class="col-md-6">
            <h1 class='display-4 font-italic'>Your next train journey begins here.</h1>
            <p class="lead my-3">Order tickets, ckeck for timetables, manage your journey in the personal area.</p>
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
        <form action="order/ricerca.php" method="post" onSubmit="return convalidaRicerca()">
          <div class="row">
            <div class="col-md-3 col-sm-6 col-6">
              <h5 class="lead text-light">Partenza:</h5>

                <input name="partenza" class="form-control" type="text" placeholder="es. Roma Termini" id="partenza" autocomplete="false">
                <!-- <div class="autocomplete" id="autocomplete">

                </div> -->
                <div id="response" class="autocomplete result"></div>

            </div>
            <div class="col-md-3 col-sm-6 col-6">
              <h5 class="lead text-light">Destinazione:</h5>
              <input name="destinazione" class="form-control" type="text" placeholder="es. Milano Centrale" id="destinazione">
              <div id="responseDest" class="autocomplete result"></div>
            </div>
            <div class="col-md-3 col-sm-6 col-6">
              <h5 class="lead text-light">Data:</h5>
              <input name="data" class="form-control is-datetime" type="date" id="data" placeholder="es. 01/11/2018" >
            </div>
            <div class="col-md-3 col-sm-6 col-6 ">
              <button class="btn btn-primary search-button" type="submit" id="cerca">Cerca</button>
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
            <ul>
              <li>Roma</li>
              <li>Milano</li>
            </ul>
          </div>
          <div class="col-md-4 col-6">
            <ul>
              <li>Torino</li>
              <li>Genova</li>
            </ul>
          </div>
          <div class="col-md-4 col-6">
            <ul>
              <li>Bologna</li>
              <li>Trieste</li>
            </ul>
          </div>
          <div class="col-md-4 col-6">
            <ul>
              <li>Firenze</li>
              <li>Napoli</li>
            </ul>
          </div>
          <div class="col-md-4 col-6">
            <ul>
              <li>Venezia</li>
              <li>Reggio Calabria</li>
            </ul>
          </div>
          <div class="col-md-4 col-6">
            <ul>
              <li>Campobasso</li>
              <li>Ladispoli</li>
            </ul>
          </div>
        </div>
      </div>
    </div>


    <!-- FOOTER -->
    <?php getFooter(); ?>


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
      $(document).ready(autocomplete());
    </script>

  </body>
</html>
