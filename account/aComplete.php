<?php
    session_start();

    include '../funzioni.php';
  
    $mysqlDb = new MysqlFunctions;
    $connection = $mysqlDb->connetti();

    $indirizzoResidenza = $_POST['indirizzoResidenza'];
    $paeseResidenza = $_POST['paeseResidenza'];
    $cittaResidenza = $_POST['cittaResidenza'];
    $provinciaResidenza = $_POST['provinciaResidenza'];
    $dataNascita = $_POST['dataNascita'];
    $codiceFiscale = $_POST['codiceFiscale'];
    $sesso = $_POST['sesso'];
    $stazionePartPreferita = $_POST['stazionePartPreferita'];
    $stazioneArrPreferita = $_POST['stazioneArrPreferita'];
    $idUtente = $_SESSION['idUtente'];

    $query = "UPDATE `utente` SET `accountFilled`= '1', `indirizzoResidenza`='".$indirizzoResidenza."',`cittaResidenza`='".$cittaResidenza."',`provinciaResidenza`='".$provinciaResidenza."',`paeseResidenza`='".$paeseResidenza."',`dataNascita`='".$dataNascita."',`codiceFiscale`='".$codiceFiscale."',`sesso`='".$sesso."',`stazionePartPreferita`='".$stazionePartPreferita."',`stazioneArrPreferita`='".$stazioneArrPreferita."' WHERE `idUtente`='".$idUtente."'";

    if (mysql_query($query)) {
        $_SESSION['accountFilled'] = 1;
        $_SESSION['sesso'] = $sesso;
        if($_SESSION['acquistoInCorso'] == 1){
            header("location: ../order/shoppingcart.php");
          } else {
            header("location: dashboard.php");
          }
    } else {
        echo "Error updating record: " . mysql_error($connection);
    }

?>