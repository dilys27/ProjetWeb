<?php
$title = "Espace Administrateur";
include("header_a.php");
?>
    <div class="jumbotron">
      <div class="container">
        <h1>Espace Administrateur</h1>
      </div>
    </div>
        
    <div class="container">
      <!-- Example row of columns -->
      <div class="row">
        <div class="col-md-4">
          <h2>Gestion des pizzas</h2>
          <p>Cette fonctionnalité vous permet de gérer les recettes de pizzas disponibles sur ce site. Vous pouvez ajouter, supprimer ou modifier une recette.</p>
          <p><a class="btn btn-info btn-lg" href="gestion_p.php" role="button">Voir détails &raquo;</a></p>
        </div>
        <div class="col-md-4">
          <h2>Gestion des suppléments</h2>
          <p>Cette fonctionnalité vous permet de gérer les suppléments disponibles sur ce site. Vous pouvez ajouter, supprimer ou modifier un supplément.</p>
          <p><a class="btn btn-info btn-lg" href="gestion_s.php" role="button">Voir détails &raquo;</a></p>
        </div>
        <div class="col-md-4">
          <h2>Gestion des commandes</h2>
          <p>Cette fonctionnalité vous permet de voir toute la liste des commandes de pizzas passées par vos clients. Vous pouvez changer l'état d'une commande.</p>
          <p><a class="btn btn-info btn-lg" href="gestion_cmd.php" role="button">Voir détails&raquo;</a></p>
       </div>
        
      </div>

<?php
    include("footer2.php");
?>
