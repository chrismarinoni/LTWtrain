<?php
  // avvio la sessione
  session_start();

  include '../funzioni.php';

  // recupero i valori passati via POST
  $email = $_POST['email'];
  $password = md5($_POST['password']);

  $mysqlDb = new MysqlFunctions;
  $connection = $mysqlDb->connetti();

  // effettuo la query per verificare la correttezza del login
  $result = mysql_query("SELECT * FROM utente WHERE email = '" . mysql_real_escape_string($email) . "'");
  
  // verifico che ci siano dei risltati...
  if (mysql_num_rows($result) > 0)
  {
    $row = mysql_fetch_assoc($result);
    // effettuo la comparazione della password digitata con quella salvata nel DB
    if (strcmp($row['password'], $password) == 0) {
      // in caso di successo creo la sesione
      $_SESSION['idUtente'] = $row['idUtente'];
      $_SESSION['nome'] = $row['nome'];
      $_SESSION['cognome'] = $row['cognome'];
      $_SESSION['email'] = $row['email'];
      $_SESSION['numBigliettiAcquistati'] = $row['numBigliettiAcquistati'];
      // e stampo 1 (che identifica il successo)
      echo 1;
    }else{
      // in caso di comparazione non riuscita stampo zero
      echo 0;
    }
  }else{
    // se non ci sono risultati stampo zero
    echo 0;
  }
?>