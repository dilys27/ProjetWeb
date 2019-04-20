<?php 
require('auth/EtreAuthentifie.php');
$page_title="Commande de pizzas";
include("header_u.php");

if(!isset($_POST["pizza"]) && !isset($_POST["extra"])){
    include("cmd_form.php");
}else{
    $rid = $_POST["pizza"];	
    $statut = "preparation";
    $sid = $_POST["extra"];
    $r=rand();
    $h=date("Y-m-d H:i:s");      
    try {
            $uid = $idm->getUid();
            $SQL = "INSERT INTO commandes VALUES (NULL,?,?,?,?,?)";
            $res = $db->prepare($SQL);
            $res->execute(array($r,$uid,$rid,$h,$statut));
            if(!$res) echo "fail";
            $cid = $db->lastInsertId();

                $sid = (int)$sid;
 			    $SQL = "INSERT INTO extras VALUES (?,?)";
                $st = $db->prepare($SQL);
                $res = $st->execute(array($cid,$sid));
                if(!$res) echo "fail";
   ?>
<div class="jumbotron">
      <div class="container">
        <div class="center">
<?php
        echo "\n<p>Votre commande est bien prise en compte, statut : $statut</p>\n";
        
        $SQL = "SELECT prix FROM recettes WHERE rid = $rid";
        $res = $db->prepare($SQL);
        $st = $res->execute();
        if(!$res) echo "fail";
        $pprix;
        foreach($res as $row){
            $pprix = $row["prix"];
        }
        
        $SQL = "SELECT prix FROM supplements WHERE sid = $sid";
        $res = $db->prepare($SQL);
        $st = $res->execute();
        $sprix;
        if(!$res) echo "fail";
        foreach($res as $row){
            $sprix = $row["prix"];
        }
        
        $prix_final = $sprix + $pprix;
        
        echo "<P>Le prix total de votre commande est de : $prix_final euros.\n";
?>
        <p><a href="liste_cmd.php" role="button" class="btn btn-info btn-lg">Voir liste des commandes</a></p> 
<?php      
        }catch (PDOException $e){
            echo "Erreur SQL: ".$e->getMessage();
        }
}  
?>
      </div>
    </div>
    </div>
<?php
include("footer2.php");
 ?>