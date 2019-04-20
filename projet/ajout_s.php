<?php
require("auth/EtreAuthentifie.php");
 $page="Ajouter un supplément";
 include("header_a.php");

//Récupération des données

if (!isset($_POST['nom']) || !isset($_POST['prix'])) {
  include("aj_form_s.php"); 
} else {
  $snom = $_POST['nom']; 
  $sprix=  $_POST['prix'];
 }
 
// Vérification 
  if ($snom=="" || !is_numeric($sprix) || $sprix<0) {
       include("aj_form_s.php");   
} else {
//connexion a la BD
require("db_config.php");

try{
$db = new PDO("mysql:host=$hostname;dbname=$dbname;charset=utf8", $username, $password);
$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

$SQL = "INSERT INTO supplements VALUES (DEFAULT,?,?)";
$st = $db->prepare($SQL);
$res = $st->execute(array($snom, $sprix));
?>
<div class="jumbotron">
      <div class="container">
        <div class="center">
<?php

   if (!$res || ($st->rowCount() ==0)){ 
      echo "<P>Erreur d’ajout";
   }else{ 
      echo "<P>L'ajout a été effectué.<P>";
   }
?>
        <p><a href="liste_s.php" role="button" class="btn btn-info btn-lg">Voir liste des suppléments</a></p> 
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
