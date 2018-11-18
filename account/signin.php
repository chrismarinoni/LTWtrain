<<?php ?>
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
    <link href="../css/signin.css" rel="stylesheet">

    <script rel="text/javascript" lang="javascript" href="../js/signin_validation.js"></script>

  </head>

  <body class="text-center">
    <video autoplay muted loop id="backgroundVideo">
      <source src="../images/background-signin.mp4" type="video/mp4">
    </video>
    <div class="form-signin" id="form">
      <a href="../index.php">
      <img class="mb-4" src="https://cdn2.iconfinder.com/data/icons/harry-potter-colour-collection/60/28_-_Harry_Potter_-_Colour_-_Hogwarts_Express-512.png" alt="" width="128" height="128">
      </a>
      <form id="form-signin" action="/dashboard.php" method="post">
        <div>
          <h1 class="h3 mb-3 font-weight-normal">Effettua il login</h1>
          <label for="inputEmail" class="sr-only">Indirizzo email</label>
          <input name="email "type="email" id="inputEmail" class="form-control" placeholder="Email address" required autofocus>
          <label for="inputPassword" class="sr-only">Password</label>
          <input name="password" type="password" id="inputPassword" class="form-control" placeholder="Password" required>

          <button class="btn btn-lg btn-primary btn-block mb-1" type="submit">Accedi</button>


          oppure
          <!-- <button class="btn btn-lg btn-primary btn-block" type="submit">Registrati</button> -->
          <input class="btn btn-lg btn-primary btn-block" id="register" type="button" value="Registrati"  />
          <p class="mt-5 mb-3 text-muted">&copy; LTWtrain 2018-2019</p>
        </div>
      </form>
      <form class="form-register" id="form-register" action="/dashboard.php" method="post">
        <div >
          <h1 class="h3 mb-3 font-weight-normal">Effettua la registrazione</h1>
          <div class="row">

            <div class="col-md-6">
              <label for="inputName" class="sr-only">Nome</label>
              <p>Nome</p>
              <input type="text" id="inputName" class="form-control mb-4" placeholder="Nome" required autofocus>
            </div>
            <div class="col-md-6">
              <label for="inputSurname" class="sr-only">Cognome</label>
              <p>Cognome</p>
              <input type="text" id="inputSurname" class="form-control  mb-4" placeholder="Cognome" required>
            </div>
            <div class="col-md-6">
              <label for="inputEmail" class="sr-only">Indirizzo email</label>
              <p>Indirizzo indirizzo email</p>
              <input type="email" id="inputEmailreg" class="form-control  mb-4" placeholder="Email address" required>
            </div>
            <div class="col-md-6">
              <label for="inputEmail" class="sr-only">Conferma indirizzo email</label>
              <p>Conferma indirizzo email</p>
              <input type="email" id="reInputEmailReg" class="form-control  mb-4" placeholder="Email address" required>
            </div>
            <div class="col-md-6">
              <label for="inputPassword" class="sr-only">Password</label>
              <p>Inserisci una password</p>
              <input type="password" id="inputPasswordReg" class="form-control  mb-4" placeholder="Password" required>
            </div>
            <div class="col-md-6">
              <label for="inputPassword" class="sr-only">Password</label>
              <p>Reinserisci una password</p>
              <input type="password" id="reInputPasswordReg" class="form-control mb-4" placeholder="Password" required>
            </div>
          </div>
          <button class="btn btn-lg btn-primary btn-block mb-1" type="submit">Registrati</button>
          oppure
          <input class="btn btn-lg btn-primary btn-block" id="signin-back" type="button" value="Accedi"  />
        </div>

        <p class="mt-5 mb-3 text-muted">&copy; LTWtrain 2018-2019</p>
      </form>
    </div>

    <script
			  src="https://code.jquery.com/jquery-3.3.1.min.js"
			  integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8="
			  crossorigin="anonymous"></script>

    <script type="text/javascript">
      $("#register").click(function () {
        $("#form-signin").slideUp(1200);
        $("#form").animate({maxWidth: '+=300px'},1100,'linear',function(){ $("#form-register").slideDown(1000);});

      });
      $("#signin-back").click(function () {
        $("#form-register").slideUp(1200);
        
        $("#form").animate({maxWidth: '-=300px'},1100,'linear',function(){ $("#form-signin").slideDown(1000);});
      });
    </script>

  </body>
</html>
