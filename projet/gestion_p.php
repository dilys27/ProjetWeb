<?php
require("auth/EtreAuthentifie.php");
//$idm->getUid();
//$idm->getRole();
$title = "Gestion des pizzas";
include("header_a.php");
?>
<link href = "css/style2.css" rel="stylesheet">
<div class="jumbotron">
      <div class="container">
        <h1>Gestion des pizzas</h1>
        <p><form method="post"  action="aj_form_p.php">
          <button type="submit" 
            value= "Ajouter une recette" class="btn btn-success btn-lg">Ajouter une recette</button>
         </form>
          </p>
        
      </div>
    </div>
      
<table class="table">
  <thead>
    <tr>
      <th>Nom</th>
      <th>Prix</th>
      <th>Changement</th>
    </tr>
  </thead>

<?php
// connexion à la BD
require("db_config.php");
try {
$db = new PDO("mysql:host=$hostname;dbname=$dbname;charset=utf8", $username, $password);
$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

// requête
$SQL = "SELECT * FROM recettes";
$res = $db->prepare($SQL);
$st = $res->execute();
if (!$res && $st->rowCount()==0){
   echo "<P>La liste des pizzas est vide.";
}else{
	echo "<table>\n";
}
while($row=$res->fetch()) {
?>

    <tbody>
    <tr>
      <th scope="row"><?php echo htmlspecialchars($row['nom'])?></th>
      <td><?php echo $row['prix']." €"?></td>
    <td>
      <a class="btn btn-warning btn-sm" role="button" href='mod_p.php?id=<?php echo $row['rid'] ?>'>modifier</a>
      <a class="btn btn-danger btn-sm" role="button" href='sup_p.php?id=<?php echo $row['rid'] ?>'>supprimer</a>
    </td> 
        </tr>
    </tbody>

<?php
};
?>

<?php
echo "</table>\n";
$db=null;
}catch (PDOException $e){
echo "Erreur SQL: ".$e->getMessage();
}
include("footer2.php");
?>


