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
                <p style="font-size:1.3rem;">Per procedere con un acquisto &egrave; necessario fornire ulteriori informazioni personali.</p>
            </div>
            <div>
                <form method="POST">
                    <div>
                            <h5>Personal information</h5>
                            <p>All your personal infos will never be distributed and will be used only to provide you the service.</p>
                            <div class="row mt-4">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="labelResidence">Residence address</label>
                                         <input type="text" class="form-control" id="residenceAddress" placeholder="Enter your residence address">        
                                    </div>
                                    <div class="form-group">
                                            <label for="labelCity">City</label>
                                             <input type="text" class="form-control" id="residenceCity" placeholder="Enter your residence city">        
                                    </div>
                                    <div class="form-group">
                                        <label for="labelProvince">Province</label>
                                        <input type="text" class="form-control" id="residenceProvince" placeholder="Enter your residence province">        
                                    </div>
                                </div>
                                <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="labelCountry">Country</label>
                                             <input type="text" class="form-control" id="residenceCountry" placeholder="Enter your residence country">        
                                        </div>
                                        <div class="form-group">
                                                <label for="labelDateBirth">Date of Birth</label>
                                                 <input type="date" class="form-control" id="residenceDateBirth" placeholder="Enter your date of birth">        
                                        </div>
                                        <div class="form-group">
                                            <label for="label">Fiscal Code</label>
                                            <input type="text" class="form-control" id="residenceProvince" placeholder="Enter your fiscal code">        
                                        </div>
                                    </div>
                            </div>
                    </div>
                    <div class="mt-4 mb-4">
                            <h5 >Additional infos</h5>
                            <div class="form-group mt-3">
                                <label for="labelResidence">Favourite station</label>
                                <input type="text" class="form-control" id="residenceAddress" ariadescribedby="helpStation" placeholder="Enter your residence address">        
                                <small id="helpStation" class="form-text text-muted">The "favourite station" is the one  you frequent the most.</small>
                            </div>
                    </div>
                    <input class="btn btn-primary" type="submit" value="Submit"> or
                    <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#cancelConfirm">
                            Cancel
                    </button>
                </form>
            </div>
        </div>

        <!-- Modal -->
        <div class="modal fade" id="cancelConfirm" tabindex="-1" role="dialog" aria-labelledby="cancelConfirm" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                <h5 class="modal-title" id="cancelConfirmTitle">Are you sure?</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                </div>
                <div class="modal-body">
                If you cancel this operation the information inserted will not be registered. If you were ordering a ticket, your order will be blocked. To order a ticket you need to submit this form.
                </div>
                <div class="modal-footer">
                <button type="button" class="btn btn-secondary" onclick="window.location.href='dashboard.php'">Continue with cancel</button>
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