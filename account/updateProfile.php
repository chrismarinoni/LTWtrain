<?php
    session_start();

    include '../funzioni.php';
  
    $mysqlDb = new MysqlFunctions;
    $connection = $mysqlDb->connetti();
    $email = $_POST['email'];
    $password = md5($_POST['password']);
    $echopassword = "";
    if($password != md5("****")) {
        $echopassword = "`password`= '".$password."',";
    }
    $indirizzoResidenza = $_POST['indirizzoResidenza'];
    $paeseResidenza = $_POST['paeseResidenza'];
    $cittaResidenza = $_POST['cittaResidenza'];
    $provinciaResidenza = $_POST['provinciaResidenza'];
    $stazionePartPreferita = $_POST['stazionePartPreferita'];
    $stazioneArrPreferita = $_POST['stazioneArrPreferita'];
    $idUtente = $_SESSION['idUtente'];

    echo($query);


    $query = "UPDATE `utente` SET ".$echopassword." `email`= '".mysql_real_escape_string($email)."', `indirizzoResidenza`='".$indirizzoResidenza."',`cittaResidenza`='".$cittaResidenza."',`provinciaResidenza`='".$provinciaResidenza."',`paeseResidenza`='".$paeseResidenza."',`stazionePartPreferita`='".$stazionePartPreferita."',`stazioneArrPreferita`='".$stazioneArrPreferita."' WHERE `idUtente`='".$idUtente."'";

    mysql_query($query, $connection) or die("Errore nell'aggiornamento dell'account");

    header("location: dashboard.php");
 

?>