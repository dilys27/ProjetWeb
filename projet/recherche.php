<?php

require("auth/EtreAuthentifie.php");

if($idm->getRole() == 'admin'){
    $title="Resultat de la recherche";
    include("header_a.php");
    ?> 
<link href = "css/style2.css" rel="stylesheet">
    <div class="jumbotron">
      <div class="container">
     <div class='center'>
        <h1>Résultat de la recherche</h1>
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
    if(isset($_GET['rech'])){
        $rech = $_GET['rech'];
    }else{
        echo "<P>Vous n'avez rien rechercher.";
    }

    // connexion à la BD
    require("db_config.php");
    try {
        $db = new PDO("mysql:host=$hostname;dbname=$dbname;charset=utf8", $username, $password);
        $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        // requête
        $SQL = "SELECT * FROM recettes WHERE nom LIKE '%$rech%'";
        $res = $db->prepare($SQL);
        $st = $res->execute();
        if (!$res && $st->rowCount()==0){
            echo "<P>Aucun résultat pour cette recherche.";
        }else{
	       echo "<table>\n";
        }
        while($row=$res->fetch()) {
        ?>
    <tbody>
    <tr>
      <td><?php echo htmlspecialchars($row['nom'])?></td>
      <td><?php echo $row['prix']." €"?></td>
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
    <?php
}else{
    $title="Resultat de la recherche";
    include ("header_u.php");
    ?> 
<link href = "css/style2.css" rel="stylesheet">
    <div class="jumbotron">
      <div class="container">
     <div class='center'>
        <h1>Résultat de la recherche</h1>
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
    if(isset($_GET['rech'])){
        $rech = $_GET['rech'];
    }else{
        echo "Vous n'avez rien rechercher.";
    }

    // connexion à la BD
    require("db_config.php");
    try {
        $db = new PDO("mysql:host=$hostname;dbname=$dbname;charset=utf8", $username, $password);
        $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        // requête
        $SQL = "SELECT * FROM recettes WHERE nom LIKE '%$rech%'";
        $res = $db->prepare($SQL);
        $st = $res->execute();
        if (!$res && $st->rowCount()==0){
            echo "<P>Aucun résultat pour cette recherche.";
        }else{
	       echo "<table>\n";
        }
        while($row=$res->fetch()) {
    ?>
    <tbody>
    <tr>
      <td><?php echo htmlspecialchars($row['nom'])?></td>
      <td><?php echo $row['prix']." €"?></td>
    </tr>
    </tbody>

    <?php
        };
    ?>

    <?php
        echo "</table>\n";
?>
 <br>
   <div class='center'>
<a class="btn btn-primary btn_lg" href="cmd.php" role="button">Passer une commande&raquo;</a>
    </div>
<?php
        $db=null;
    }catch (PDOException $e){
        echo "Erreur SQL: ".$e->getMessage();
    }
    include("footer2.php");
}
