<?php
require("auth/EtreAuthentifie.php");
 $page="Modifier le statut d'une commande ";
include("header_a.php");
//connexion a la BD
require("db_config.php");

if(!isset($_GET["id"])){
    include("mod_cmd_form.php");
} else if ( !isset($_POST['statut']) || empty($_POST['statut'])){
          include ("mod_cmd_form.php") ;
}else{
    $cid = $_GET["id"];	   
    // vérification existence id
      $sql = "SELECT * FROM commandes WHERE cid=?";
      $st = $db->prepare($sql);
      $st->execute([$cid]); //$st->execute([$cid]);
?>
<div class="jumbotron">
      <div class="container">
        <div class="center">
<?php
      // tester rowcount
      if ($st->rowCount() ==0) {
        echo "<p>Erreur dans cid</p>\n";
      }else{
        $statut = $_POST['statut'];
        $row = $st->fetch();
       //modification 
       try {
           try {
            $uid = $idm->getUid();
            $SQL = "UPDATE commandes SET statut=? WHERE cid=?";
            $res = $db->prepare($SQL);
            $res->execute(array($statut, $cid));
            if(!$res) echo "fail";
        
            echo "<P>Modification effectuée.\n";
?>
        <p><a href="gestion_cmd.php" role="button" class="btn btn-info btn-lg">Voir liste des commandes</a></p> 
<?php
            }catch (PDOException $e){
               echo "Erreur SQL: ".$e->getMessage();
            }
       }catch (PDOException $e){
            echo "Erreur SQL: ".$e->getMessage();
       }
      } 
}
?>
      </div>
    </div>
    </div>
<?php
include("footer2.php");
 ?>