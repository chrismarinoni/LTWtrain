<?php
     include '../funzioni.php';
     $mysqlDb = new MysqlFunctions;
     $connection = $mysqlDb->connetti();
     // echo("<b>DEBUG MSG:</b><br />Connesso correttamente al database <br/>");
     $query = "SELECT nome FROM stazione WHERE true";
     $result = mysql_query($query, $connection) or die('Errore...');
   
     $stazioni = mysql_fetch_array($result);
     // $codStazione = mysql_result($result, 0, "codStazione");
     // $nomeStazione = mysql_result($result, 0, "nome");
     // echo("Test1: ".$codStazione." ".$nomeStazione);
   
   
   
     if (isset($_POST['search'])) {
           // $response = "<ul><li>Nessuna corrispondenza</li></ul>";
     
           //$connection2 = new mysqli('localhost', 'ltwtrain', '', 'my_ltwtrain');
           $q = $_POST['q'];
           //$sql = $connection->query("SELECT `nome` FROM `stazione` WHERE `nome` LIKE %$q%'");
        $response="";
       $sql = mysql_query("SELECT nome FROM stazione WHERE nome LIKE '%$q%'");
       $num = mysql_numrows($sql);
       if ($num > 0) {
            $response = "<ul class='list-group'>";
            $i = 0;
               while ($i < $num) {
                    // if($i == 0) $response .= '<li class="list-group-item list-group-item-action">' . mysql_result($sql, $i, "nome") . "</ul>";
                    // else 
                    $response .= '<li class="list-group-item list-group-item-action">' . mysql_result($sql, $i, "nome") . "</ul>";
                    $i++;
                }
            $response .= "</ul>";
        }
     
     
           exit($response);
       }
     $mysqlDb->disconnetti();
?>