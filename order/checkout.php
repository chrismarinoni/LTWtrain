<?php
  session_start();
  include "../component/header.php";
  if($_SESSION['idUtente'] == "")
    header("location: ../account/signin.html");
  if($_SESSION['codViaggioAndata'] == "")
    header("location: ../dashboard.php");
  $qA = $_SESSION['quantitaA'];
  $qR = $_SESSION['quantitaR'];
  echo($qA. " ". $qR);
?>

<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="../../../../favicon.ico">

    <title>LTWtrain - Pagamento</title>

    <!-- Bootstrap core CSS -->
    <link href="../css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="../css/style.css" rel="stylesheet">
    
    <script>
      
    </script>

  </head>

  <body class="bg-light">

    <!-- HEADER -->
    <?php getHeader(); ?>


    <div class="container">
      <div class="py-5 text-center">
        <img class="mb-4" src="https://cdn2.iconfinder.com/data/icons/harry-potter-colour-collection/60/28_-_Harry_Potter_-_Colour_-_Hogwarts_Express-512.png" alt="" width="128" height="128">
        <h2>Procedi con l'acquisto</h2>
        <p class="lead">Inserisci le informazioni richieste. Il tuo biglietto comparir&agrave; nell'area personale una volta processato l'acquisto.</p>
      </div>

      <div class="row">
        <div class="col-md-4 order-md-2 mb-4 text-center">
          <h5>Completare le informazioni per la fatturazione in automatico?</h5>
          <p>Puoi completare i campi qui affianco con le informazioni salvate sul tuo account. Per farlo, clicca sul seguente pulsante</p>
          <button class="btn btn-primary" id="completamento">Completamento automatico</button>
          <hr class="mb-4 mt-5">
          <img src="http://www.speedyfarmacia.it/wsite/FRVMAFI3103874/images/pagamenti_sicuri.png?1539250215" width="70%"/>
          <p style="font-size: 1.1rem">I dati sui metodi di pagamento inseriti in questa pagina non vengono salvati sui nostri server e sono utilizzati al solo fine di processare il pagamento. La connessione è protetta.</p>
          <!-- <h4 class="d-flex justify-content-between align-items-center mb-3">
            <span class="text-muted">Il tuo carrello</span>
            <span class="badge badge-secondary badge-pill">1</span>
          </h4> -->
          <!-- <ul class="list-group mb-3">
            <li class="list-group-item d-flex justify-content-between lh-condensed">
              <div>
                <h6 class="my-0">Acquisto</h6>
                <small class="text-muted">Brief description</small>
              </div>
              <span class="text-muted">$12</span>
            </li> -->
            <!-- <li class="list-group-item d-flex justify-content-between bg-light">
              <div class="text-success">
                <h6 class="my-0">Promo code</h6>
                <small>EXAMPLECODE</small>
              </div>
              <span class="text-success">-$5</span>
            </li> -->
            <!-- <li class="list-group-item d-flex justify-content-between lh-condensed">
              <div>
                <div class="input-group">
                    <h6 class="my-0">Quantit&agrave;</h6>
                    <select class="custom-select text-muted" id="inputGroupSelect04" aria-label="Example select with button addon">
                        <option selected value="1">1</option>
                        <option value="2">2</option>
                        <option value="3">3</option>
                        <option value="4">4</option>
                        <option value="5">5</option>
                    </select>
                </div>   
            </li>            
            
            <li class="list-group-item d-flex justify-content-between">
              <span>Total (USD)</span>
              <strong>$20</strong>
            </li>
          </ul> -->

          <!-- <form class="card p-2">
            <div class="input-group">
              <input type="text" class="form-control" placeholder="Promo code">
              <div class="input-group-append">
                <button type="submit" class="btn btn-secondary">Redeem</button>
              </div>
            </div>
          </form>-->
        </div> 
        <div class="col-md-8 order-md-1">
          <h4 class="mb-3">Informazioni fatturazione</h4> 
          <form id="form" action="../account/dashboard.php" onsubmit="return pay();" validate>
            <div class="row mt-4">
              <div class="col-md-6 mb-3">
                <label for="nome">Nome</label>
                <input type="text" class="form-control" id="nome" placeholder="" value="" required>
                <div class="invalid-feedback">
                  &Egrave; richiesto l'inserimento di un nome valido.
                </div>
              </div>
              <div class="col-md-6 mb-3">
                <label for="cognome">Cognome</label>
                <input type="text" class="form-control" id="cognome" placeholder="" value="" required>
                <div class="invalid-feedback">
                &Egrave; richiesto l'inserimento di un cognome valido.
                </div>
              </div>
            </div>

            <div class="mb-3">
              <label for="email">Email</label>
              <input type="email" class="form-control" id="email" placeholder="latua@email.com" required>
              <div class="invalid-feedback">
                Please enter a valid email address for shipping updates.
              </div>
            </div>

            <div class="row">
              <div class="mb-3 col-md-6">
                <label for="indirizzo">Indirizzo</label>
                <input type="text" class="form-control" id="indirizzo" placeholder="Viale Regina Elena 1" required>
                <div class="invalid-feedback">
                  Inserisci un indirizzo valido.
                </div>
              </div>
              <div class="col-md-6 mb-3">
                <label for="citta">Città</label>
                <input type="text" class="form-control" id="citta" placeholder="Roma" required>
                <div class="invalid-feedback">
                  Please provide a valid state.
                </div>
              </div>
            </div>
            

            <div class="row">

              <div class="col-md-6 mb-3">
                <label for="provincia">Provincia</label>
                <input type="text" class="form-control" id="provincia" placeholder="Roma" required>
                <div class="invalid-feedback">
                  Please select a valid country.
                </div>
              </div>
              
              <div class="col-md-6 mb-3">
                <label for="cf">Codice Fiscale</label>
                <input type="text" class="form-control" id="cf" placeholder="00000" required>
                <div class="invalid-feedback">
                  Zip code required.
                </div>
              </div>
            </div>
            <hr class="mb-4">

            <h4 class="mb-3">Pagamento</h4>

            <div class="d-block my-3">
              <div class="custom-control custom-radio">
                <input id="credit" name="paymentMethod" type="radio" class="custom-control-input" checked required>
                <label class="custom-control-label" for="credit">Carta di Credito</label>
              </div>
              <div class="custom-control custom-radio">
                <input id="debit" name="paymentMethod" type="radio" class="custom-control-input" required>
                <label class="custom-control-label" for="debit">Carta di debito</label>
              </div>

            </div>
            <div id="carte">
              <div class="row">
                <div class="col-md-6 mb-3">
                  <label for="cc-name">Nome intestatario</label>
                  <input type="text" class="form-control" id="cc-name" placeholder="" required>
                  <small class="text-muted">Nome completo come mostrato sulla carta</small>
                  <div class="invalid-feedback">
                    Name on card is required
                  </div>
                </div>
                <div class="col-md-6 mb-3">
                  <label for="cc-number">Numero carta di credito</label>
                  <input type="text" class="form-control" id="cc-number" placeholder="" required>
                  <div class="invalid-feedback">
                    Credit card number is required
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-md-3 mb-3">
                  <label for="cc-expiration">Scadenza</label>
                  <input type="text" class="form-control" id="cc-expiration" placeholder="" required>
                  <div class="invalid-feedback">
                    Expiration date required
                  </div>
                </div>
                <div class="col-md-3 mb-3">
                  <label for="cc-cvv">CVV</label>
                  <input type="text" class="form-control" id="cc-cvv" placeholder="" required>
                  <div class="invalid-feedback">
                    Security code required
                  </div>
                </div>
              </div>
            </div>

            <hr class="mb-4">
            <button class="btn btn-primary btn-lg btn-block" type="submit" id="paga">Paga</button>
          </form>
        </div>
      </div>

      <footer class="my-5 pt-5 text-muted text-center text-small">
        <p class="mb-1">&copy; 2018-2019 LTWtrain</p>
        <ul class="list-inline">
          <li class="list-inline-item"><a href="#">Privacy</a></li>
          <li class="list-inline-item"><a href="#">Termini e condizioni</a></li>
          <li class="list-inline-item"><a href="#">Supporto</a></li>
        </ul>
      </footer>
    </div>

    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
  	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>

    <script>
      // Example starter JavaScript for disabling form submissions if there are invalid fields
      // (function() {
      //   'use strict';

      //   window.addEventListener('load', function() {
      //     // Fetch all the forms we want to apply custom Bootstrap validation styles to
      //     var forms = document.getElementsByClassName('needs-validation');

      //     // Loop over them and prevent submission
      //     var validation = Array.prototype.filter.call(forms, function(form) {
      //       form.addEventListener('submit', function(event) {
      //         if (form.checkValidity() === false) {
      //           event.preventDefault();
      //           event.stopPropagation();
      //         } else {
                
      //           });
      //         }
      //         form.classList.add('was-validated');
      //       }, false);
            
      //     });
          
      //   }, false);
      // })();


      function pay() {
        $.post("orderSubmit.php", {  
                	procediConOrdine : 1
                }, 
                function(risposta) {
                  if(risposta == 0) {
                    return true;
                    // document.location ="http://www.ltwtrain.altervista.org/account/dashboard.php";
                  } else { 
                    alert("Si è presentato un errore: "+risposta); 
                  return false;
                }
                }
        );
      };

      $("#completamento").click(function() {
        $.ajax({
          data: 'getData=1',
          url: '../account/getPData.php',
          method: 'POST',
          success: function(msg){
            pinfo = msg.split("||");
            document.getElementById("nome").value=pinfo[0];
            document.getElementById("cognome").value=pinfo[1];
            document.getElementById("email").value=pinfo[2];
            document.getElementById("indirizzo").value=pinfo[3];
            document.getElementById("citta").value=pinfo[4];
            document.getElementById("provincia").value=pinfo[5];
            document.getElementById("cf").value=pinfo[6];
          } 
        });
      });

      // $("#form").submit(function(){
      //   alert("CIAO");
      //   // $.post("orderSubmit.php", {  
			// 	// 	procediConOrdine : 1
			// 	// }, 
			// 	// function(risposta) {
			// 	// 	window.location="../account/dashboard.php";
      //   // });
      // });

    </script>
  </body>
</html>
