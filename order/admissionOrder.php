<?php  
    $codViaggio = $_GET["codViaggio"];
    $partenza = $_GET["partenza"];
    $destinazione = $_GET["destinazione"];
    $prezzo = $_GET["prezzo"];
    session_start();
    if($_SESSION['codUtente'] == "")
        header("location: ../account/signin.php");
    $_SESSION['codViaggio'] = $codViaggio;
    $_SESSION['stPartenza'] = $partenza;
    $_SESSION['stArrivo'] = $destinazione;
    $_SESSION['prezzo'] = $prezzo;
    header("location: checkout.php");
?>