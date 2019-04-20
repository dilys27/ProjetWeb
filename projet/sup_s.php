<?php
require("auth/EtreAuthentifie.php");
$page_title = "Suppression supplément";
include("header_a.php");

if (!isset($_GET["id"])) {
    echo "<p>Erreur</p>\n";
}else if (!isset($_POST["supprimer"]) && !isset($_POST["annuler"]) ){
    include("sup_form_s.php"); 
 } else if (isset($_POST["annuler"])){
       redirect("gestion_s.php");
}else{
    $id = $_GET["id"];
    //connexion a la BD
require("db_config.php");

    //suppression
 try{ 
  $db = new PDO("mysql:host=$hostname;dbname=$dbname;charset=utf8", $username, $password);
  $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

  $SQL = "DELETE FROM supplements WHERE sid=?";
  $st = $db->prepare($SQL);
  $st->execute([$id]);//"id"->"$id");
?>
<div class="jumbotron">
      <div class="container">
        <div class="center">
<?php
  if ($st->rowCount() ==0)
   echo "<br/><p>Erreur de suppression<p>\n";
   else echo "<br/><p>La suppression a été effectuée.</p>\n";
?>
        <p><a href="gestion_s.php" role="button" class="btn btn-info btn-lg">Voir liste des suppléments</a></p> 
<?php 
$db=null;
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
