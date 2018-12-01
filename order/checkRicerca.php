<?php

    $tipoRicerca = $_POST['tipoRicerca'];
    $partenza = $_POST['partenza'];
    $destinazione = $_POST['destinazione'];
    $data = $_POST['data'];

    include '../funzioni.php';
    $mysqlDb = new MysqlFunctions;
    $connection = $mysqlDb->connetti();
    if($tipoRicerca == 1 ){
        $query = "SELECT `codStazione` FROM `stazione` WHERE `nome` = '".$partenza."'";
        $result = mysql_query($query, $connection) or die('Al momento non &egrave; possibile connettersi al database. Riprovare in un secondo momento');
        if(mysql_numrows($result)==0) echo(0);
        else {
            $query = "SELECT * FROM `stazione` WHERE `nome` = '".$destinazione."' ";
            $result = mysql_query($query, $connection) or die('Errore accesso database [ERROR 2A3] ...');
            if(mysql_numrows($result)==0) echo(1);
            else {
                if($data < date(Y-m-d)) echo(2);
                else echo(3);
            }

        }
    }
    
    
?>