<?php
class MysqlFunctions
{ //yG55xgRSrxWN
  // parametri per la connessione al database
  private $nomehost = "localhost";
  private $nomeuser = "ltwtrain";
  private $password = "";
  private $nomedb = "my_ltwtrain";
  // controllo sulle connessioni attive
  private $attiva = false;
  // funzione per la connessione a MySQL
  // public function connetti()
  // {
  //  if(!$this->attiva)
  //  {
  //   $connessione = mysql_connect($this->nomehost,$this->nomeuser,$this->password);
  //      }else{
  //       return true;
  //      }
  //   }
  public function connetti() {
    if(!$this->attiva) {
     if($connessione = mysql_connect($this->nomehost,$this->nomeuser,$this->password) or die (mysql_error())) {
        // selezione del database
        $selezione = mysql_select_db($this->nomedb,$connessione) or die (mysql_error());
        $attiva = true;
        return $connessione;
      }
    }else{ return true; }

  }

  public function disconnetti()
  {
    if($this->attiva){
      if(mysql_close()){
        $this->attiva = false;
        return true;
      }else{
        return false;
      }
    }
  }
}
?>
