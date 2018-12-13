<?php  

    session_start();


    $codViaggioAndata = "";
    $partenza = "";
    $destinazione = "";
    $prezzoAndata = "";
    $operatore = "";
    $giornoAndata = "";
    $orarioAndata = "";
    $operatoreAndata = "";

    echo("Avvio admissionOrder.php -- ");

    if(isset($_POST["codViaggioA"])){
        $codViaggioAndata = $_POST["codViaggioA"];
        $partenza = $_POST["partenzaA"];
        $destinazione = $_POST["destinazioneA"];
        $prezzoAndata = $_POST["prezzoAndataA"];
        $giornoAndata = $_POST["giornoAndataA"];
        $orarioAndata = $_POST["orarioAndataA"];
        $operatoreAndata = $_POST["operatoreAndataA"];

        $codViaggioRitorno = $_POST["codViaggioR"];
        $prezzoRitorno = $_POST["prezzoRitornoR"];
        $giornoRitorno = $_POST["giornoRitornoR"];
        $orarioRitorno = $_POST["orarioRitornoR"];
        $operatoreRitorno = $_POST["operatoreRitornoR"];

    } else {
        $codViaggioAndata = $_GET["codViaggio"];
        $partenza = $_GET["partenza"];
        $destinazione = $_GET["destinazione"];
        $prezzoAndata = $_GET["prezzoAndata"];
        $operatoreAndata = $_GET["operatore"];
        $giornoAndata = $_GET["giornoAndata"];
        $orarioAndata = $_GET["orarioAndata"];
    }
    
    echo("Ho settato le variabili -- ");
    
    $_SESSION['acquistoInCorso'] = 1;
    $_SESSION['codViaggioAndata'] = $codViaggioAndata;
    $_SESSION['stPartenza'] = $partenza;
    $_SESSION['stArrivo'] = $destinazione;
    $_SESSION['prezzoAndata'] = $prezzoAndata;
    $_SESSION['operatoreAndata'] = $operatoreAndata;
    $_SESSION['giornoAndata'] = $giornoAndata;
    $_SESSION['orarioAndata'] = $orarioAndata;

    $_SESSION['codViaggioRitorno'] = $codViaggioRitorno;
    $_SESSION['prezzoRitorno'] = $prezzoRitorno;
    $_SESSION['operatoreRitorno'] = $operatoreRitorno;
    $_SESSION['giornoRitorno'] = $giornoRitorno;
    $_SESSION['orarioRitorno'] = $orarioRitorno;

    echo("Tutto ok");
    // header("location: shoppingcart.php");
?>