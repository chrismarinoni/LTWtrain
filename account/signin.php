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

    <!-- <script src="ajax.js" type="text/javascript"></script> -->

  </head>

  <body class="text-center">
    <video autoplay muted loop id="backgroundVideo">
      <source src="../images/background-signin.mp4" type="video/mp4">
    </video>

    <div class="form-signin" id="form">
      <div class="alert alert-danger" role="alert" id="alert">
        <h4 class="alert-heading">Oh no!</h4>
        <p id="p-alert">Le credenziali inserite non sono valide.</p>
      </div>

      <a href="../index.php">
      <img class="mb-4" src="https://cdn2.iconfinder.com/data/icons/harry-potter-colour-collection/60/28_-_Harry_Potter_-_Colour_-_Hogwarts_Express-512.png" alt="" width="128" height="128">
      </a>
      <form id="form-signin" method="post">
        <div>
          <h1 class="h3 mb-3 font-weight-normal">Effettua il login</h1>
          <label for="inputEmail" class="sr-only">Indirizzo email</label>
          <input name="email" type="email" id="email" class="form-control" placeholder="Email address" required autofocus>
          <label for="inputPassword" class="sr-only">Password</label>
          <input name="password" type="password" id="password" class="form-control" placeholder="Password" required>

          <input class="btn btn-lg btn-primary btn-block mb-1" type="submit" id="accedi" value="Accedi">

          oppure
          <!-- <button class="btn btn-lg btn-primary btn-block" type="submit">Registrati</button> -->
          <input class="btn btn-lg btn-primary btn-block" id="register-go" type="button" value="Registrati" >
          <p class="mt-5 mb-3 text-muted">&copy; LTWtrain 2018-2019</p>
        </div>
      </form>
      <form class="form-register" id="form-register" method="post">
        <div >
          <h1 class="h3 mb-3 font-weight-normal">Effettua la registrazione</h1>
          <div class="row">

            <div class="col-md-6">
              <label for="inputName">Nome</label>
              <input name="name" type="text" id="inputName" class="form-control mb-4" placeholder="Nome" required autofocus>
            </div>
            <div class="col-md-6">
              <label for="inputSurname">Cognome</label>
              <input name="surname" type="text" id="inputSurname" class="form-control  mb-4" placeholder="Cognome" required>
            </div>
            <div class="col-md-6">
              <label for="inputEmailreg">Indirizzo email</label>
              <input name="emailReg" type="email" id="inputEmailReg" class="form-control  mb-4" placeholder="Email address" required>
            </div>
            <div class="col-md-6">
              <label for="reInputEmailReg">Conferma indirizzo email</label>
              <input name="reEmailReg" type="email" id="reInputEmailReg" class="form-control  mb-4" placeholder="Email address" required>
            </div>
            <div class="col-md-6">
              <label for="inputPasswordReg">Password</label>
              <input name="emailReg" type="password" id="inputPasswordReg" class="form-control  mb-4" placeholder="Password" required>
            </div>
            <div class="col-md-6">
              <label for="reInputPasswordReg">Password</label>
              <input name="reEmailReg" type="password" id="reInputPasswordReg" class="form-control mb-4" placeholder="Password" required>
            </div>
          </div>
          <input class="btn btn-lg btn-primary btn-block mb-1" type="submit" id="register" value="Registrati">
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
      $("#register-go").click(function () {
        $("#form-signin").slideUp(1200);
        $("#alert").slideUp(1200);
        $("#form").animate({maxWidth: '+=300px'},1100,'linear',function(){ $("#form-register").slideDown(1000);});

      });
      $("#signin-back").click(function () {
        $("#form-register").slideUp(1200);
        $("#alert").slideUp(1200);
        $("#form").animate({maxWidth: '-=300px'},1100,'linear',function(){ $("#form-signin").slideDown(1000);});
      });
    </script>


    
    <!-- ESEMPIO SCRIPT  -->


    <script type="text/javascript">
      $("#form-signin").submit(function() {
      // passo i dati (via POST) al file PHP che effettua le verifiche 
        $.post("login.php", { email: $('#email').val(), password: $('#password').val(), rand: Math.random() }, function(risposta) {
          // se i dati sono corretti...
          if (risposta == 1) {
            alert("Login effettuato");
            document.location= "dashboard.php";
          // se, invece, i dati non sono corretti...
          }else{
            // stampo un messaggio di errore
            $("#alert").slideDown(1000);
          }
         });
      // evito il submit del form (che deve essere gestito solo dalla funzione Javascript)
        return false;
      });

      $("#form-register").submit(function() {
      // passo i dati (via POST) al file PHP che effettua le verifiche 
        $.post("register.php", { nome: $('#inputName').val(), cognome: $('#inputSurname').val(), email: $('#inputEmailReg').val(), password: $('#inputPasswordReg').val(), rand: Math.random() }, function(risposta) {
          // se i dati sono corretti...
          if (risposta == 1) {
            // applico l'effetto allo span con id "messaggio"
            alert("Registrazione effettuata");
            // document.location = 'dashboard.php';
            
          // se, invece, i dati non sono corretti...
          }else{
            // stampo un messaggio di errore
            var el = document.getElementById("p-alert");
            el.innerHTML = risposta;
            $("#alert").slideDown(1000);
          }
         });
      // evito il submit del form (che deve essere gestito solo dalla funzione Javascript)
        return false;
      });

    </script>

  </body>
</html>
