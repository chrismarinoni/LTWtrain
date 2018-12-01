<?php
    include '../component/header.php';
    include '../component/footer.php';
?>
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="../../../../favicon.ico">

    <title>Complete your Account - LTWtrain</title>

    <!-- Bootstrap core CSS -->
    <link href="../css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="../css/style.css" rel="stylesheet">

    <script rel="text/javascript" lang="javascript" href="../js/signin_validation.js"></script>

    <!-- <script src="ajax.js" type="text/javascript"></script> -->

  </head>

  <body>
        
        <!-- HEADER -->
        <?php getHeader(); ?>



        <div class="container mt-5 mb-5">
            <div class="mb-5" >
                <h1>Completa il tuo profilo</h1>
                <p style="font-size:1.3rem;">Per procedere con un acquisto &egrave; necessario fornire ulteriori informazioni personali. Tutti i dati possono essere modificati in qualunque momento dal profilo.</p>
            </div>
            <div>
                <form method="POST" action="aComplete.php">
                    <div>
                            <h5>Informazionim personali</h5>
                            <p>Tutte le tue informazioni personali non saranno mai comunicate a terzi e verranno usate da noi per fornire i servizi richiesti.</p>
                            <div class="row mt-4">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="labelIndirizzo">Indirizzo di Residenza</label>
                                         <input name="indirizzoResidenza" type="text" class="form-control" id="indirizzoResidenza" placeholder="Inserisci il tuo indirizzo di residenza">        
                                    </div>
                                    <div class="form-group">
                                            <label for="labelCitta">Citt&agrave;</label>
                                             <input name="cittaResidenza" type="text" class="form-control" id="cittaResidenza" placeholder="Inserisci il tuo indirizzo di residenza">        
                                    </div>
                                    <div class="form-group">
                                        <label for="labelProvincia">Provincia</label>
                                        <input name="provinciaResidenza" type="text" class="form-control" id="provinciaResidenza" placeholder="Seleziona la provincia">        
                                    </div>
                                </div>
                                <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="labelPaese">Paese</label>
                                             <input name="paeseResidenza" type="text" class="form-control" id="paeseResidenza" placeholder="Inserisci il Paese">        
                                        </div>
                                        <div class="form-group">
                                                <label for="labelDataNascita">Data di Nascita</label>
                                                 <input name="dataNascita" type="date" class="form-control" id="dataNascita" placeholder="La tua data di nascita">        
                                        </div>
                                        <div class="form-group">
                                            <label for="label">Codice Fiscale</label>
                                            <input name="codiceFiscale" type="text" class="form-control" id="codiceFiscale" placeholder="Inserisci il tuo codice fiscale">        
                                        </div>
                                </div>
                                <div class="col-md-6">
                                        <div class="form-group">
                                        <label for="labelCountry">Sesso</label>
                                            <select name="sesso" id="sesso" class="form-control">
                                                <option value="seleziona">Seleziona un'opzione...</option>
                                                <option value="M">M</option>
                                                <option value="F">F</option>
                                                <option value="ND">Non dichiaro</option>
                                            </select>                                            
                                        </div>
                                </div>
                            </div>
                    </div>
                    <div class="mt-4 mb-4">
                            <h5 >Additional infos</h5>
                            <div class="form-group mt-3">
                                <label for="labelResidence">Favourite station 1</label>
                                <input name="stazionePartPreferita" type="text" class="form-control" id="stazionePartPreferita" ariadescribedby="helpStation" placeholder="Scrivi il nome di una stazione">        
                                <small id="helpStation" class="form-text text-muted">Le stazioni preferite sono quelle stazioni che frequenti maggiormente. Una volta selezionate le due stazioni, il sistema ti suggerirà in fase di ricerca il collegamento fra le le due stazioni preferite.</small>
                            </div>
                            <div class="form-group mt-3">
                                <label for="labelResidence">Favourite station 2</label>
                                <input name="stazioneArrPreferita" type="text" class="form-control" id="stazioneArrPreferita" ariadescribedby="helpStation" placeholder="Scrivi il nome di una seconda stazione">        
                                <small id="helpStation" class="form-text text-muted">The "favourite station" is the one  you frequent the most.</small>
                            </div>
                    </div>
                    <input class="btn btn-primary" type="submit" value="Invia"> oppure
                    <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#cancelConfirm">
                            Annulla
                    </button>
                </form>
            </div>
        </div>

        <!-- Modal -->
        <div class="modal fade" id="cancelConfirm" tabindex="-1" role="dialog" aria-labelledby="cancelConfirm" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                <h5 class="modal-title" id="cancelConfirmTitle">Attento. Sei sicuro?</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                </div>
                <div class="modal-body">
                    Se cancelli questa operazione le informazioni inserite non saranno registrate. Se stavi ordinando un biglietto, il tuo ordine sarà automaticamente cancellato. Per ordinare un biglietto &egrave; necessario inviare questo form.
                </div>
                <div class="modal-footer">
                <button type="button" class="btn btn-secondary" onclick="window.location.href='cleanOrder.php'">Continue with cancel</button>
                <button type="button" class="btn btn-primary" data-dismiss="modal" >Come back</button>
                </div>
            </div>
            </div>
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