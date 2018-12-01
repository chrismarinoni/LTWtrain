<?php  
    $codViaggio = $_GET["codViaggio"];
    $partenza = $_GET["partenza"];
    $destinazione = $_GET["destinazione"];
    $prezzo = $_GET["prezzo"];
    $operatore = $_GET["operatore"];
    session_start();
    
    $_SESSION['acquistoInCorso'] = 1;
    $_SESSION['codViaggio'] = $codViaggio;
    $_SESSION['stPartenza'] = $partenza;
    $_SESSION['stArrivo'] = $destinazione;
    $_SESSION['prezzo'] = $prezzo;
    $_SESSION['operatore'] = $operatore;
    header("location: shoppingcart.php");
?>