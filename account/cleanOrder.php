<?php
    session_start();
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
    header("location: http://ltwtrain.altervista.org/account/dashboard.php");
?>