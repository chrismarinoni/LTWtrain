<?php
    include '../component/header.php';
    include '../component/footer.php';
    include '../funzioni.php';

    session_start();
    $idUtente = $_SESSION['idUtente'];
    $numBigliettiAcquistati = $_SESSION['numBigliettiAcquistati'];
  
    $mysqlDb = new MysqlFunctions;
    $connection = $mysqlDb->connetti();
	$query = "SELECT * FROM utente WHERE idUtente='".$idUtente."'";
	$result = mysql_query($query, $connection) or die('Errore...');
  
    $nome = mysql_result($result,0,"nome");
    $cognome = mysql_result($result,0,"cognome");
    $email = mysql_result($result,0,"email");
    $indirizzoResidenza = mysql_result($result, 0, 'indirizzoResidenza');
    $cittaResidenza = mysql_result($result, 0, 'cittaResidenza');
    $provinciaResidenza = mysql_result($result, 0, 'provinciaResidenza');
    $paeseResidenza = mysql_result($result, 0, 'paeseResidenza');
    $dataNascita = mysql_result($result, 0, 'dataNascita');
    $indirizzoResidenza = mysql_result($result, 0, 'indirizzoResidenza');
    $indirizzoResidenza = mysql_result($result, 0, 'indirizzoResidenza');
    $indirizzoResidenza = mysql_result($result, 0, 'indirizzoResidenza');
    $indirizzoResidenza = mysql_result($result, 0, 'indirizzoResidenza');


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

    <!-- <div class="container mt-4">
      <h1><?php echo($nome." ".$cognome); ?>, questo è il tuo profilo</h1>
      <h3>Informazioni personali</h3>
      <div class="row mt-5">
        <div class="col-md-4">
          <p style="font-size: 1.2rem">Nome</b><span style="font-size: 1.5rem"><?php echo($nome); ?></span></p>
          <p style="font-size: 1.2rem">Cognome</p><p><?php echo($nome); ?></p>
        </div>
      </div>
    </div>
     -->






    <div class="container bootstrap snippet mt-5">
    <div class="row">
  		<div class="col-sm-10"><h1><?php echo($nome." ".$cognome); ?></h1></div>
    	<!-- <div class="col-sm-2"><a href="/users" class="pull-right"><img title="profile image" class="img-circle img-responsive" src="http://www.gravatar.com/avatar/28fd20ccec6865e2d5f0e1f4446eb7bf?s=100"></a></div> -->
    </div>
    <div class="row mt-4">
  		<div class="col-md-3"><!--left col-->
              

      <div class="text-center">
        <img src="http://ssl.gstatic.com/accounts/ui/avatar_2x.png" class="avatar img-circle img-thumbnail" alt="avatar">
        <h6>Carica una foto differente...</h6>
        <input type="file" class="text-center center-block file-upload" style="width:100%">
      </div><br>          
          
          <ul class="list-group">
            <li class="list-group-item text-muted">Attivit&agrave; <i class="fa fa-dashboard fa-1x"></i></li>
            <li class="list-group-item text-right"><span class="pull-left"><strong>Biglietti Acquistati</strong></span>  <?php echo($numBigliettiAcquistati); ?></li>
            <li class="list-group-item text-right"><span class="pull-left"><strong>Abbonamento</strong></span> 0</li>
          </ul> 
              
          
        </div><!--/col-3-->
    	  <div class="col-md-9">
              
          <div class="tab-content">
            <div class="tab-pane active" id="home">
                <hr>
                  <form class="form" action="##" method="post" id="registrationForm">

                        <div class="form-group">
                          
                          <div class="col-xs-6">
                              <label for="email"><h4>Email</h4></label>
                              <input type="text" class="form-control" name="email" id="email" title="modifica la tua email" value="<?php echo($email) ?>">
                          </div>
                        </div>
                        <div class="form-group">
                          
                          <div class="col-xs-6">
                              <label for="email"><h4>Password</h4></label>
                              <input type="password" class="form-control" name="password" id="password" title="modifica la tua password" value="****">
                          </div>
                        </div>
                        <div class="form-group">
                            
                            <div class="col-xs-6">
                                <label for="phone"><h4>Indirizzo residenza</h4></label>
                                <input type="text" class="form-control" name="indirizzoResidenza" id="indirizzoResidenza" title="modifica l'indirizzo di residenza" value="<?php echo($indirizzoResidenza); ?>">
                            </div>
                        </div>
          
                      <div class="form-group">
                          <div class="col-xs-6">
                             <label for="mobile"><h4>Citt&agrave; residenza</h4></label>
                              <input type="text" class="form-control" name="cittaResidenza" id="cittaResidenza" title="modifica la città di residenza" value="<?php echo($cittaResidenza); ?>">
                          </div>
                      </div>
                      <div class="form-group">
                          
                          <div class="col-xs-6">
                              <label for="provinciaResidenza"><h4>Provincia residenza</h4></label>
                              <input type="text" class="form-control" name="provinciaResidenza" id="provinciaResidenza" title="modifica la provincia di residenza" value="<?php echo($provinciaResidenza); ?>">
                          </div>
                      </div>
                      <div class="form-group">
                          
                          <div class="col-xs-6">
                              <label for="paeseResidenza"><h4>Paese residenza</h4></label>
                              <input type="email" class="form-control" id="paeseResidenza" name="paeseResidenza" value="<?php echo($paeseResidenza) ?>">
                          </div>
                      </div>
                      <div class="form-group">
                          
                          <div class="col-xs-6">
                              <label for="password"><h4>Data di nascita</h4></label>
                              <input type="password" class="form-control" name="password" id="password" placeholder="password" title="enter your password.">
                          </div>
                      </div>
                      <div class="form-group">
                          
                          <div class="col-xs-6">
                            <label for="password2"><h4>Codice fiscale</h4></label>
                              <input type="password" class="form-control" name="password2" id="password2" placeholder="password2" title="enter your password2.">
                          </div>
                      </div>
                      <div class="form-group">
                          
                          <div class="col-xs-6">
                            <label for="password2"><h4>Sesso</h4></label>
                              <input type="password" class="form-control" name="password2" id="password2" placeholder="password2" title="enter your password2.">
                          </div>
                      </div>
                      <div class="form-group">
                          
                          <div class="col-xs-6">
                            <label for="password2"><h4>Sesso</h4></label>
                              <input type="password" class="form-control" name="password2" id="password2" placeholder="password2" title="enter your password2.">
                          </div>
                      </div>
                      <div class="form-group">
                           <div class="col-xs-12">
                                <br>
                              	<button class="btn btn-lg btn-success" type="submit"><i class="glyphicon glyphicon-ok-sign"></i> Save</button>
                               	<button class="btn btn-lg" type="reset"><i class="glyphicon glyphicon-repeat"></i> Reset</button>
                            </div>
                      </div>
              	</form>
              
              <hr>
              
             </div><!--/tab-pane-->
          </div><!--/tab-content-->

        </div><!--/col-9-->
    </div><!--/row-->
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

        <script>
        //         $(document).ready(function() {

            
        // var readURL = function(input) {
        //     if (input.files && input.files[0]) {
        //         var reader = new FileReader();

        //         reader.onload = function (e) {
        //             $('.avatar').attr('src', e.target.result);
        //         }

        //         reader.readAsDataURL(input.files[0]);
        //     }
        // }


        // $(".file-upload").on('change', function(){
        //     readURL(this);
        // });
        // });
        </script>


  </body>
</html>
