<?php
require("auth/EtreAuthentifie.php");
 $page="Ajouter une recette de pizza";
 include("header_a.php");

//Récupération des données

if (!isset($_POST['nom']) || !isset($_POST['prix'])) {
  include("aj_form_p.php"); 
} else {
  $nom = $_POST['nom']; 
  $pprix=  $_POST['prix'];
 }
 
// Vérification 
  if ($nom=="" || !is_numeric($pprix) || $pprix<0) {
       include("aj_form_p.php");   
} else {
//connexion a la BD
require("db_config.php");

try{
$db = new PDO("mysql:host=$hostname;dbname=$dbname;charset=utf8", $username, $password);
$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

$SQL = "INSERT INTO recettes VALUES (DEFAULT,?,?)";
$st = $db->prepare($SQL);
$res = $st->execute(array($nom, $pprix));

   if (!$res){ // ou if ($st->rowCount() ==0) 
      echo "<P>Erreur d’ajout";
   }else{ 
?>
<div class="jumbotron">
      <div class="container">
        <div class="center">
<?php
      echo "<P>L'ajout a été effectué.<P>";
   }
?>
    <p><a href="liste_p.php" role="button" class="btn btn-info btn-lg">Voir liste des pizzas</a></p>
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
