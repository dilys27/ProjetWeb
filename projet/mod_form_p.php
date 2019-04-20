<?php
$page="Modifier une recette de pizza";
include("header_a.php");
?>
<div class="jumbotron">
     <div class="container">
     <div class='center'>
        <h1>Modifier une recette de pizza </h1>
    </div>

<form action="" method="post">
  <table>
<tr><td>Nom</td><td><input type="text" name="nom"  value="<?php
echo htmlspecialchars($row['nom']);?>" /></td></tr>
<tr><td>Prix</td><td><input type="number" name="prix" value="<?php echo $row['prix'];?>" /></td></tr>
  </table>
  
<form method="post">
  <input class="btn btn-warning btn-md" type="submit" name="modifier" value="Modifier">
  <input class="btn btn-danger btn-md" type="submit" name="annuler" value="Annuler">
</form>

</form>

