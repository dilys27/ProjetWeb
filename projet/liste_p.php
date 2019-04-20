<?php
require("auth/EtreAuthentifie.php");
$title = "Liste des pizzas";
include("header2.php");
?> 
<link href = "css/style2.css" rel="stylesheet">
    <div class="jumbotron">
      <div class="container">
     <div class='center'>
        <h1>Liste des pizzas</h1>
        </div>
    </div>
        

<table class="table">
  <thead class="thead-inverse">
    <tr> 
      <th>Nom</th>
      <th>Prix</th>
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
 foreach ($res as $row){
?>

    <tbody>
    <tr>
      <th scope="row"><?php echo htmlspecialchars($row['nom'])?></th>
      <td><?php echo $row['prix']." €"?></td>
    </tr>
    </tbody>

<?php
};
?>


<?php
echo "</table>\n";
    if($idm->getRole() == 'admin'){
?>
    <br> 
    <p style="text-align:center"><a href="gestion_p.php" role="button" class="btn btn-primary btn-lg">Gestion des pizzas&raquo;</a></p> 
<?php
 }else{
?>
     <br> 
    <p style="text-align:center"><a href="cmd.php" role="button" class="btn btn-primary btn-lg">Passer Commande&raquo;</a></p>
<?php
 }
$db=null;
}catch (PDOException $e){
echo "Erreur SQL: ".$e->getMessage();
}
                      
include("footer2.php");
?>

