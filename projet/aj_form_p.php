<?php
$page="Ajout d'une recette de pizza";
include("header_a.php");
?>
 <div class="jumbotron">
     <div class="container">
     <div class='center'>
        <h1>Ajouter une recette de pizza </h1>
    </div>
<form action="ajout_p.php" method="post">
    <br/>
  <table>
<tr><td>Nom</td><td><input type="text" name="nom" /></td></tr>
<tr><td>Prix</td><td><input type="number" name="prix" /></td></tr>
  </table>
<br/>
<button type="submit" 
            value= "ajouter" class="btn btn-success">ajouter</button>

</form>

<?php
include("footer2.php");
?>