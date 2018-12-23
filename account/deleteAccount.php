<?php
    session_start();

    include '../funzioni.php';
  
    $mysqlDb = new MysqlFunctions;
    $connection = $mysqlDb->connetti();
    $idUtente = $_SESSION['idUtente'];
    $query = "DELETE FROM `biglietto` WHERE `idUtente`='".$idUtente."'";

    mysql_query($query, $connection) or die("Errore nell'eliminazione dei biglietti acquistati");

    $query = "DELETE FROM `utente` WHERE `idUtente`='".$idUtente."'";

    mysql_query($query, $connection) or die("Errore nell'eliminazione dell'account");

    header("location: logout.php");

?>