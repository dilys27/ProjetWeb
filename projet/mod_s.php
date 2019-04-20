<?php
require("auth/EtreAuthentifie.php");
 $page="Modifier un supplément ";
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
      $sql = "SELECT * FROM supplements WHERE sid=?";
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
            include("mod_form_s.php"); 
        } else if (isset($_POST["annuler"])){
            redirect("gestion_s.php");
        }else if (!isset($_POST['nom']) || !isset($_POST['prix'])) {
            include("mod_form_s.php"); 
         }else {
            $nom = $_POST['nom'];
            $sprix = $_POST['prix'];
            if ($nom=="" || !is_numeric($sprix) || $sprix<0 ) {
            include("mod_form_s.php");   
         }else {
         $SQL = "UPDATE supplements SET nom=?, prix=? WHERE sid=?";
           
         $st = $db->prepare($SQL);
         $res = $st->execute(array($nom, $sprix, $id));
?>
<div class="jumbotron">
      <div class="container">
        <div class="center">
<?php             
                if (!$res || $st->rowCount()==0)
                {           echo "<P>Erreur de modification";
         }else{ 
             echo "<P>La modification a bien été effectué.";
         }
            }
        }
?>
        <p><a href="liste_s.php" role="button" class="btn btn-info btn-lg">Voir liste des suppléments</a></p> 
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
      