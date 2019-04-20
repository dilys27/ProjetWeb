<?php
require("auth/EtreAuthentifie.php");
//$idm->getUid();
//$idm->getRole();
$title = "Gestion des suppléments";
include("header_a.php");
?>
<link href = "css/style2.css" rel="stylesheet">
<div class="jumbotron">
      <div class="container">
        <h1>Gestion des suppléments</h1>
        <p><form method="post"  action="aj_form_s.php">
          <button type="submit" 
            value= "Ajouter un supplément" class="btn btn-success btn-lg">Ajouter un supplément</button>
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
$SQL = "SELECT * FROM supplements";
$res = $db->prepare($SQL);
$st = $res->execute();
if (!$res && $st->rowCount()==0){
   echo "<P>La liste des suppléments est vide.";
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
      <a class="btn btn-warning btn-md" role="button" href='mod_s.php?id=<?php echo $row['sid'] ?>'>modifier</a>
      <a class="btn btn-danger btn-md" role="button" href='sup_s.php?id=<?php echo $row['sid'] ?>'>supprimer</a>
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
