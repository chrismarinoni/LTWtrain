<?php
     // avvio la sessione
    session_start();

    include '../funzioni.php';

    // recupero i valori passati via POST
    $nome = htmlspecialchars($_POST['nome'],ENT_QUOTES);
    $cognome = htmlspecialchars($_POST['cognome'],ENT_QUOTES);
    $email = $_POST['email'];
    $password = md5($_POST['password']);

    $mysqlDb = new MysqlFunctions;
    $connection = $mysqlDb->connetti();

    $result = mysql_query("SELECT * FROM utente WHERE email = '" . mysql_real_escape_string($email) . "'");
    
    // verifico che ci siano dei risltati...
    if (mysql_num_rows($result) > 0){
        echo "L'email inserita risulta essere già associata ad un altro account.";
    }else{
        // se non ci sono risultati stampo zero
        mysql_query("INSERT INTO `utente`(`nome`, `cognome`, `email`, `password`) VALUES ('".$nome."', '".$cognome."', '".mysql_real_escape_string($email)."', '".$password."')");
        echo 1;
    }
?>