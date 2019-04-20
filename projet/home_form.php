<?php
$title = "Accueil";
include("header2.php");
?>

    <div class="jumbotron">
      <div class="container">
        <h1>Bonjour, 
          <?php
            echo $idm->getIdentity();
           ?> </h1>
        <p>Vous pouvez désormais accéder aux fonctionnalités de ce site depuis votre espace membre.</p>
        <p><a class="btn btn-primary btn-lg" href="espace_membre.php" role="button">Espace Membre &raquo;</a></p>
        
      </div>

<?php
    include("footer2.php");
?>
