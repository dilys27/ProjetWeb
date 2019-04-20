<?php
require('auth/EtreAuthentifie.php');
require("db_config.php");
$title = "Liste des commandes passées";
include("header_u.php");
?> 
<link href = "css/style2.css" rel="stylesheet">
    <div class="jumbotron">
      <div class="container">
     <div class='center'>
        <h1>Liste des commandes passées</h1>
        </div>
    </div>
        
<table class="table">
  <thead class="thead-inverse">
    <tr>
      <th>N°</th>
      <th>Réf</th>
      <th>Date</th>
      <th>Pizza</th> 
      <th>Extras</th>
      <th>Total</th>
      <th>Statut</th>
    </tr>
  </thead>
 
<?php
    try {
        $db = new PDO("mysql:host=$hostname;dbname=$dbname;charset=utf8", $username, $password);
        $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $uid=$idm->getUid();      
        $SQL = "SELECT commandes.cid AS cid, ref, date, statut, recettes.prix AS p, recettes.nom AS n, supplements.prix AS x, supplements.nom AS s FROM (commandes LEFT JOIN recettes ON recettes.rid=commandes.rid LEFT JOIN extras ON extras.cid=commandes.cid LEFT JOIN supplements ON supplements.sid=extras.sid)  WHERE commandes.uid=$uid ORDER BY commandes.cid";
        $res = $db->prepare($SQL);
        $st = $res->execute();
        if (!$res && $st->rowCount()==0) echo "<P>Pas de commande";
        else {
              echo "<table>\n <tr>";          
            while($row=$res->fetch()) {
                $total = $row['p'] + $row['x'];
                echo "<td>".$row['cid']."</td><td>".$row['ref']."</td>
                <td>".$row['date']."</td>
                <td>".$row['n']." - ".$row['p']." euros</td><td>".$row['s']." - ".$row['x']." euros</td><td>".$total." euros</td>
                <td>".$row['statut']."</td></tr>";
            }
            echo "</table>\n";
            $SQ="SELECT SUM(prix) AS prix_c FROM commandes INNER JOIN recettes ON recettes.rid = commandes.rid WHERE commandes.uid=$uid" ;
$re=$db->prepare($SQ);
$st = $re->execute();
 foreach ($re as $ro);
 
$SQ="SELECT SUM(prix) AS prix_s FROM (supplements INNER JOIN extras ON supplements.sid = extras.sid) INNER JOIN commandes on extras.cid = commandes.cid WHERE commandes.uid=$uid" ;
$ress=$db->prepare($SQ);
$st = $ress->execute();

 foreach ($ress as $r) ;

 $prix_totale = $ro['prix_c'] + $r['prix_s'] ;
?>
        <br>
        <P style="text-align:center"> Dépense totale des commandes : </P>
<?php
echo '<P style="text-align:center">'.$prix_totale.' € </P>' ;
            $db = null;
        }
    }catch (PDOException $e){
        echo "Erreur SQL: ".$e->getMessage();
    }
                          
include("footer2.php");
?>
