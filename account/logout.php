<?php
    session_start();
    $_SESSION = array();
    session_destroy();
    header("location: http://www.ltwtrain.altervista.org/index.php");
?>