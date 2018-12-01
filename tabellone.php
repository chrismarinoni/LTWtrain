<?php
    include 'funzioni.php';
    include 'component/header.php';
    include 'component/footer.php';
    $mysqlDb = new MysqlFunctions;
    $connection = $mysqlDb->connetti();
    $orarioCalcolato = date("H:i:s");

    $data = date("Y-m-d");
    $query = "SELECT * FROM `treno` AS t INNER JOIN `viaggio` AS v ON t.codTreno = v.codTreno INNER JOIN `collegamento` AS c ON v.codCollegamento = c.codCollegamento INNER JOIN (SELECT codStazione, nome AS nomeStPart FROM `stazione`) AS s ON c.codStPart = s.codStazione INNER JOIN (SELECT codStazione, nome AS nomeStArr FROM `stazione`) AS st ON c.codStArr = st.codStazione WHERE `dataViaggio` = '".$data."' AND `orarioPart` >= '".$orarioCalcolato."' ORDER BY `orarioPart` ASC LIMIT 8";
    $result = mysql_query($query, $connection) or die('Errore accesso database [ERROR 2A3] ...');
    $numRes = mysql_numrows($result);
    $i = $numRes-1;
    $orarioMin = mysql_result($result, 0, "orarioPart");
?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>LTWtrain - Tabellone</title>
        <meta name="viewport" content="width=device-width, initial-scale=1">
    
        <link href="css/bootstrap.min.css" rel="stylesheet">

        <link href="css/style.css" rel="stylesheet">

    </head>
    <body id="body">

        <!-- HEADER -->
        <?php getHeader(); ?>


        <div class="container mt-2">
            <!-- <h1>Ci dispiace, questa pagina &egrave; ancora in fase di realizzazione.</h1>
            <strong><a href="javascript: history.go(-1)">Torna indietro</a></strong> -->
            <div class="row">
                <div class="col-md-3">
                    <span class="row" style="font-size:2rem; font-family: Roboto Condensed;"><p id="hours">22</p>:<p id="minutes">30</p>:<p id="seconds">55</p></span>
                </div>
                <div class="col-md-9">
                    <h4>Prossime partenze</h4>
                </div>
            </div>
            <?php
                 if($i == -1) {
                    echo ("<p style='font-size: 1.4rem;'>Nessun treno risulta essere in partenza a breve.");
                  }
                  while($i > -1) {
                    $dividiOrarioPart = explode(":", mysql_result($result, $i, "orarioPart"));
                    $dividiOrarioArr = explode(":", mysql_result($result, $i, "orarioArr"));
                    $orarioPart = $dividiOrarioPart[0].":".$dividiOrarioPart[1];
                    $orarioArrivo = $dividiOrarioArr[0].":".$dividiOrarioArr[1];
                    $durataViaggio = mysql_result($result, $i, "durata");
                    $tipoTreno = mysql_result($result, $i, "tipoTreno");
                    $giornoDopo = mysql_result($result, $i, "giornoDopo");
                    $partenza = mysql_result($result, $i, "nomeStPart");
                    $destinazione = mysql_result($result, $i, "nomeStArr");
                    if($giornoDopo == 1) $giornoDopo = "+1";
                    else $giornoDopo = "";
                    echo("
                        <div class='card bg-light mt-4'>
                            <div class='row mb-4 mt-4'>
                                <div class='col-md-2 text-center mt-1 mb-1'>
                                    <span>".$partenza."<br />"."<strong style='font-size: 1.2rem;'>".$orarioPart."</strong></span>
                                </div>
                                <hr>
                                <div class='col-md-1 mt-1 mb-1 result-box'>
                                    <img src='https://cdn2.iconfinder.com/data/icons/harry-potter-colour-collection/60/28_-_Harry_Potter_-_Colour_-_Hogwarts_Express-512.png'  width='30px' height='30px' alt='' class='result-element'>
                                </div>
                                <div class='col-md-2 text-center mt-1 mb-1'>
                                    <span>".$destinazione."<br>
                                <strong style='font-size: 1.2rem;'>".$orarioArrivo."<i> ".$giornoDopo."</i></strong></span>
                                </div>
                                <div class='col-md-2 text-center mt-1 mb-1 result-box'>
                                    Durata <strong> ".$durataViaggio."</strong>
                                </div>
                                <div class='col-md-3 text-center mt-1 mb-1 result-box'>".$tipoTreno."</div>
                                <div class='col-md-2 text-center mt-1 mb-1 result-box'>
                                        Ritardo <br><strong>0min</strong>
                                </div>
                            </div>
                        </div>
                    ");
                    $i--;
                  }
            ?>
            
        </div>
        

        <!-- FOOTER -->
        <?php getFooter(); ?>


        <script type="text/javascript">
            var getTime = function(){
                var today = new Date();
                var h = today.getHours();
                var m = today.getMinutes();
                var s = today.getSeconds();
                h = this.checkTime(h);
                m = this.checkTime(m);
                s = this.checkTime(s);
                document.getElementById('hours').innerText = h;
                document.getElementById('minutes').innerText = m;
                document.getElementById('seconds').innerText = s;
                var t = setTimeout(this.getTime, 1000);
                }
                var checkTime = function(i) {
                if (i < 10) {i = "0" + i};
                return i;
            }
            getTime();
        </script>

    </body>
</html>
