<?php
    session_start();
    if($_POST['procediConOrdine']!= ""){
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
        $query = "INSERT INTO `biglietto` (`idUtente`, `codViaggio`, `classeServizio`, `prezzo`, `nomeStazionePart`, `nomeStazioneArr`) VALUES ";
        for($i = 0; $i < $qA; $i++){
            if($i == $qA-1){
                $query .= "('".$idUtente."','".$codViaggioAndata."','standard','".$prezzoAndata."','".$stPart."','".$stArr."')";
            }
            else $query .= "('".$idUtente."','".$codViaggioAndata."','standard','".$prezzoAndata."','".$stPart."','".$stArr."'),";
        }
        if($qR == 0) $query .= (";");
        else $query .= (",");
        for($i = 0; $i < $qR; $i++){
            if($i == $qR-1){
                $query .= "('".$idUtente."','".$codViaggioRitorno."','standard','".$prezzoRitorno."','".$stArr."','".$stPart."');";
            } else if($i == 0){
                $query .= "('".$idUtente."','".$codViaggioRitorno."','standard','".$prezzoRitorno."','".$stArr."','".$stPart."'),";
            } else $query .= "('".$idUtente."','".$codViaggioRitorno."','standard','".$prezzoRitorno."','".$stArr."','".$stPart."'),";
        }
        $mysqlDb = new MysqlFunctions;
        $connection = $mysqlDb->connetti();
        $result = mysql_query($query, $connection) or die("esecuzione query non riuscita");
        $_SESSION['numBigliettiAcquistati'] = $_SESSION['numBigliettiAcquistati'] + $qA + $qR;
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
        echo(0);
    } else {
        echo("processamento dell'ordine errato [ERR54A]");
    }