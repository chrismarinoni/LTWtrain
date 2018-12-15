<?php
    session_start();
    if(isset($_POST['procediConOrdine'])){
        include "../funzioni.php";
        $idUtente = $_SESSION['idUtente'];
        $codViaggioAndata = $_SESSION['codViaggioAndata'];
        $codViaggioRitorno = $_SESSION['codViaggioRitorno'];
        $prezzoAndata = $_SESSION['prezzoAndata'];
        $prezzoRitorno = $_SESSION['prezzoRitorno'];
        $qA = $_SESSION['quantitaAndata'];
        $qR = $_SESSION['quantitaRitorno'];
        $stPart = $_SESSION['stPartenza'];
        $stArr = $_SESSION['stArrivo'];
        $query = "INSERT INTO `biglietto`(`idUtente`, `codViaggio`, `classeServizio`, `prezzo`, `nomeStazionePart`, `nomeStazioneArr`) VALUES";
        for($i = 0; $i < $qA; $i++){
            $query .= "('".$idUtente."','".$codViaggioAndata."','standard','".$prezzoAndata."','".$stPart."','".$stArr."')";
        }
        for($i = 0; $i < $qB; $i++){
            $query .= "('".$idUtente."','".$codViaggioRitorno."','standard','".$prezzoRitorno."','".$stArr."','".$stPart."')";
        }
        $mysqlDb = new MysqlFunctions;
        $connection = $mysqlDb->connetti();
        echo($qA."--".$qR."--".$query);
        $result = mysql_query($query, $connection) or die("Errore. Impossibile effettuare l'aquisto");
        $_SESSION['numBigliettiAcquistati'] = $_SESSION['numBIgliettiAcquistati'] + $qA + $qR;
        unset($_SESSION['codViaggioAndata']);
        unset($_SESSION['codViaggioRitorno']);
        unset($_SESSION['prezzoAndata']);
        unset($_SESSION['prezzoRitorno']);
        unset($_SESSION['quantitaAndata']);
        unset($_SESSION['quantitaRitorno']);
        unset($_SESSION['stArrivo']);
        unset($_SESSION['acquistoInCorso']);
        unset($_SESSION['stPartenza']);
        unset($_SESSION['operatoreAndata']);
        unset($_SESSION['operatoreRitorno ']);
        unset($_SESSION['giornoAndata']);
        unset($_SESSION['giornoRitorno']);
    } else {
        echo("Errore");
    }