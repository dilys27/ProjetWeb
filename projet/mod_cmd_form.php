<?php
$page="Ajout d'une recette de pizza";
include("header_a.php");
?>
 <div class="jumbotron">
     <div class="container">
     <div class='center'>
        <h1>Modifier le statut d'une commande </h1>
    </div>
<form method="post" action="">
<p>
     <select name="statut">
          <option value=1 >preparation</option>
          <option value=2 >livraison</option>
          <option value=3 >terminee</option>
     </select>
     <input class="btn btn-warning btn-md" type="submit" value="modifier" title="Modifier" />
</p>
</form>
