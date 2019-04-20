<?php
require("auth/EtreAuthentifie.php");
 $page="Modifier une recette de pizza ";
include("header_a.php");
//connexion a la BD
require("db_config.php");

//Récupération des données
if (!isset($_GET["id"])){
    echo "<p>Erreur</p>\n"; 
} else {
  try{ 
  $id = $_GET["id"];
 $db = new PDO("mysql:host=$hostname;dbname=$dbname;charset=utf8", $username, $password);
$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
     
    // vérification existence id
      $sql = "SELECT * FROM recettes WHERE rid=?";
      $st = $db->prepare($sql);
      $st->execute([$id]); //$st->execute([$id]);
      // tester rowcount
      if ($st->rowCount() ==0) {
        echo "<p>Erreur dans id</p>\n";
      }else{
        $row = $st->fetch();
       //modification
       try {

         
        // Vérification 
        if (!isset($_POST["modifier"]) && !isset($_POST["annuler"]) ){
            include("mod_form_p.php"); 
        } else if (isset($_POST["annuler"])){
            redirect("gestion_p.php");
        }else if (!isset($_POST['nom']) || !isset($_POST['prix'])) {
            include("mod_form_p.php"); 
         }else {
            $nom = $_POST['nom'];
            $pprix = $_POST['prix'];
            if ($nom=="" || !is_numeric($pprix) || $pprix<0 ) {
            include("mod_form_p.php");   
         }else {
         $SQL = "UPDATE recettes SET nom=?, prix=? WHERE rid=?";
           
         $st = $db->prepare($SQL);
         $res = $st->execute(array($nom, $pprix, $id));
?>
<div class="jumbotron">
      <div class="container">
        <div class="center">
<?php
                if (!$res || $st->rowCount()==0)
                {           echo "<p>Erreur de modification</p>";
         }else{ 
             echo "<p>La modification a bien été effectué.</p>";
         }
            }
        }
?>
        <p><a href="liste_p.php" role="button" class="btn btn-info btn-lg">Voir liste des pizzas</a></p> 
<?php           
         $db=null;
       }catch (PDOException $e){
          echo "Erreur SQL: ".$e->getMessage();
       }
    }
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
      