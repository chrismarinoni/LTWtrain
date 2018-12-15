<?php
    include '../funzioni.php';
    session_start();
    if($_POST['getData'] != ""){
        $mysqlDb = new MysqlFunctions;
        $connection = $mysqlDb->connetti();
        $id = $_SESSION['idUtente'];
        // effettuo la query per verificare la correttezza del login
        $result = mysql_query("SELECT * FROM utente WHERE idUtente = '".$id."'", $connection) or die("Errore");
        $nome = mysql_result($result, 0, "nome");
        $cognome = mysql_result($result, 0, "cognome");
        $email = mysql_result($result, 0, "email");
        $indirizzoResidenza = mysql_result($result, 0, "indirizzoResidenza");
        $cittaResidenza = mysql_result($result, 0, "cittaResidenza");
        $provinciaResidenza = mysql_result($result, 0, "provinciaResidenza");
        $codiceFiscale = mysql_result($result, 0, "codiceFiscale");
        echo($nome."||".$cognome."||".$email."||".$indirizzoResidenza."||".$cittaResidenza."||".$provinciaResidenza."||".$codiceFiscale);
    } else {
        echo("Errore");
    }

?>