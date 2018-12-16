<?php
  include '../funzioni.php';
  include '../component/header.php';
  include '../component/footer.php';
  $partenza = $_POST['partenza'];
  $destinazione = $_POST['destinazione'];
  $tipoRicerca = $_POST['tipoRicerca'];

  if($tipoRicerca == 1){
    $dataPartenza = $_POST['dataPartenza'];
    $fasciaOrariaPartenza = $_POST['fasciaOrariaPart'];
  }
  // }else if($tipoRicerca == 2){
  //   $dataRitorno = $_POST['dataRitorno'];
  //   $fasciaOrariaRitorno = $_POST['fasciaOrariaRitorno'];
  // }

  $mysqlDb = new MysqlFunctions;
  $connection = $mysqlDb->connetti();
  $query = "SELECT `codStazione` FROM `stazione` WHERE `nome` = '".$partenza."'";
  $result = mysql_query($query, $connection) or die('Errore accesso database [ERROR 1A3] ...');
  $codStPartenza = mysql_result($result,0,"codStazione");
  $query = "SELECT `codStazione` FROM `stazione` WHERE `nome` = '".$destinazione."' ";
  $result = mysql_query($query, $connection) or die('Errore accesso database [ERROR 2A3] ...');
  $codStArrivo = mysql_result($result,0,"codStazione");

  if($tipoRicerca == 1){ //Andata

    if($fasciaOrariaPartenza == "7/11") $fasciaOrariaPartenza = 1;
    else if ($fasciaOrariaPartenza == "12/15") $fasciaOrariaPartenza = 2;
    else if ($fasciaOrariaPartenza ==  "16/18") $fasciaOrariaPartenza = 3;
    else if ($fasciaOrariaPartenza ==  "19/22") $fasciaOrariaPartenza = 4;
    $now = date("H:i:s");
    if(date("Y-m-d") == $data) {$now2 = "AND `orarioPart` >= '".$now."'";
    } else $now2 = "";
    if($fasciaOrariaPartenza!=0) $fascia = " AND `fasciaOrariaPart` = '".$fasciaOrariaPartenza."' ";
    $query = "SELECT * FROM `treno` AS t INNER JOIN `viaggio` AS v ON t.codTreno = v.codTreno INNER JOIN `collegamento` AS c ON v.codCollegamento = c.codCollegamento WHERE `codStPart` = '".$codStPartenza."' AND codStArr = '".$codStArrivo."' AND `dataViaggio` = '".$dataPartenza."'".$fascia." AND `orarioPart` >= '".$now2."' ORDER BY orarioPart DESC";
  }
  // }else if($tipoRicerca == 2){ //Ritorno

  //   if($fasciaOrariaRitorno == "7/11") $fasciaOrariaRitorno = 1;
  //   else if ($fasciaOrariaRitorno == "12/15") $fasciaOrariaRitorno = 2;
  //   else if ($fasciaOrariaRitorno == "16/18") $fasciaOrariaRitorno = 3;
  //   else if ($fasciaOrariaRitorno == "19/22") $fasciaOrariaRitorno = 4;
  //   if($fasciaOrariaRitorno!=0) $fascia = " AND `fasciaOrariaPart` = '".$fasciaOrariaRitorno."'";

  //   $query = "SELECT * FROM `treno` AS t INNER JOIN `viaggio` AS v ON t.codTreno = v.codTreno INNER JOIN `collegamento` AS c ON v.codCollegamento = c.codCollegamento WHERE `codStPart` = '".$codStArrivo."' AND codStArr = '".$codStPartenza."' AND `dataViaggio` = '".$dataRitorno."'".$fascia." ORDER BY orarioPart DESC";


  // }

  // $query = "SELECT * FROM `collegamento` WHERE `codStPart` = '".$codStPartenza."' AND codStArr = '".$codStArrivo."'";
  $result = mysql_query($query, $connection) or die('Errore accesso database [ERROR 3A3] ...');
  $numRes = mysql_numrows($result);
          $risposta = "";
          $i = $numRes-1;
          if($i == -1) {
            $risposta =  "<p style='font-size: 1.4rem;'>Nessun risultato per la ricerca effettuata";
          }
          while($i > -1) {
            $dividiOrarioPart = explode(":", mysql_result($result, $i, "orarioPart"));
            $dividiOrarioArr = explode(":", mysql_result($result, $i, "orarioArr"));
            $orarioPart = $dividiOrarioPart[0].":".$dividiOrarioPart[1];
            $orarioArrivo = $dividiOrarioArr[0].":".$dividiOrarioArr[1];
            $durataViaggio = mysql_result($result, $i, "durata");
            $prezzo = mysql_result($result, $i, "prezzo");
            $dettagli = mysql_result($result, $i, "dettagli");
            $codCollegamento = mysql_result($result, $i, "codCollegamento");
            $tipoTreno = mysql_result($result, $i, "tipoTreno");
            $operatore = mysql_result($result, $i, "operatore");
            $dettagliConfort= explode("&&", mysql_result($result, $i, "dettagliTreno"));
            $giornoDopo = mysql_result($result, $i, "giornoDopo");
            $codViaggio = mysql_result($result, $i, "codViaggio");
            if($giornoDopo == 1) $giornoDopo = "+1";
            else $giornoDopo = "";
            $confort = "";
            foreach ($dettagliConfort as $elem) {
              $confort .= "<li>".$elem."</li>";
            }
            $postiTotStandard = mysql_result($result, $i, "postiTotStandard");
            $postiOccupatiStandard = mysql_result($result, $i, "postiOccupatiStandard");
            $codTreno = mysql_result($result, $i, "codTreno");
            $postiDisponibili = $postiTotStandard - $postiOccupatiStandard;


            $risposta .= "<div class='card bg-light mt-4' id='card".$codViaggio."'>
            <div class='row mb-4 mt-4'>
              <div class='col-md-2 text-center mt-1 mb-1'>
                <span>".$partenza."</span></br>"."<strong style='font-size: 1.2rem;' id='orarioPart".$codViaggio."'>".$orarioPart."</strong>
              </div>
              <hr>
              <div class='col-md-1 mt-1 mb-1 result-box'>
                  <img src='../images/train-logo-32.png'  width='30px' height='30px' alt='' class='result-element'>
              </div>
              <div class='col-md-2 text-center mt-1 mb-1'>
                <span>".$destinazione."<br>
                <strong style='font-size: 1.2rem;'>".$orarioArrivo."<i> ".$giornoDopo."</i></strong></span>
              </div>
              <div class='col-md-2 text-center mt-1 mb-1 result-box'>
                Durata <strong>".$durataViaggio."</strong>
              </div>
              <div class='col-md-2 text-center mt-1 mb-1 result-box'>".$tipoTreno."</div>
              <div class='col-md-2 text-center mt-1 mb-1 result-box'>
                <span><strong style='font-size:1.5rem;'><span id='prezzo".$codViaggio."'>".$prezzo."</span>€</strong></span></div>
                <div class='col-md-1 text-center mt-1 mb-1 result-box'>
                  <a data-toggle='collapse' href='#collapseResult".$codViaggio."' role='button' aria-expanded='false' aria-controls='collapseResult".$codViaggio."' >
                  <img class='clickable' id='arrow-down' src='../images/arrow.png' alt='Arrow for dropdown box' width='25px' height='21px'>
				          </a>
                </div>
              </div>
            </div>
            <div class='collapse' id='collapseResult".$codViaggio."'>

              <div class='card card-body' id='cardCollapse".$codViaggio."'>
                  <div class='row'>
                    <div class='col-md-5'>
                      <p>Operatore: <strong id='operatore".$codViaggio."'>".$operatore."</strong></p>
                      <p>Confort: <ul>".$confort."
                                  </ul></p>
                    </div>
                    <div class='col-md-5'>
                      <p>Tipologia Treno: <strong>".$tipoTreno."</strong></p>
                      <p>Codice Treno: ".$codTreno."</p>
                      <p>Tipologia viaggio: ".$dettagli."</p>
                      <p>Posti disponibili: <strong>".$postiDisponibili."</strong></p>
                    </div>
                    <div class='col-md-2'>
                    <button type='button' id='".$codViaggio."'class='btn btn-primary' onClick='selected_button(this)'>Seleziona treno</button>
                    </div>
                  </div>
              </div>
		      	</div>";
            $i--;
          }
          echo($risposta);
        ?>