<?php
$title = "Espace Client";
include("header_u.php");
?>

 <div class="jumbotron">
      <div class="container">
        <h1>Espace Client</h1>
      </div>
    </div>
        
    <div class="container">
      <!-- Example row of columns -->
      <div class="row">
        <div class="col-md-6">
          <h2>Passer une commande</h2>
          <p>Cette fonctionnalité vous permet de passer une commande de pizzas disponibles sur ce site. Vous pouvez également rajouter des extras.</p>
          <p><a class="btn btn-primary btn-lg" href="cmd.php" role="button">Commander &raquo;</a></p>
        </div>
        <div class="col-md-6">
          <h2>Liste des commandes passées</h2>
          <p>Cette fonctionnalité vous permet de voir toute la liste de vos commandes de pizzas passées.</p>
          <p><a class="btn btn-info btn-lg" href="liste_cmd.php" role="button">Voir détails&raquo;</a></p>
       </div>
        
      </div>

<?php
    include("footer2.php");
?>
