<?php
   $title="Commande de pizzas";
   include("header_u.php");
?>
<style>
    .form-horizontal{
        font-size: 15pt;
        font-weight: 600;
    }
</style>
<div class="jumbotron">
    <h1>Commander une pizza</h1>
</div>
<div class="container">
<form class="form-horizontal" method="POST">
    <fieldset>
        <legend>Passer commande</legend>
        <br />
        <label for="pizza">Veuillez choisir une pizza : </label>
        <select name="pizza">
        <?php 
        //include("db_config.php");
        $db = new PDO("mysql:hostname=$hostname;dbname=$dbname",$username,$password);
        $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $SQL = "SELECT rid,nom,prix FROM recettes ";
        $res = $db->prepare($SQL);
        $res->execute(array()) ;
        foreach($res as $row) {
            if (isset($row) && !empty($row)) {
               echo"<option value='$row[rid]'>".htmlspecialchars($row["nom"])." - ".htmlspecialchars($row["prix"])."$</option>";
            }
        } 
        ?>
        </select>
        <br />
        <label for="extra">Veuillez choisir un supplément : </label>
        <select name="extra">
        <?php 
        //include("db_config.php");
        $db = new PDO("mysql:hostname=$hostname;dbname=$dbname",$username,$password);
        $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $SQL = "SELECT sid,nom,prix FROM supplements";
        $res = $db->prepare($SQL);
        $res->execute(array()) ;
        foreach($res as $row) {
            if (isset($row) && !empty($row)) {
                echo"<option value='$row[sid]'>".htmlspecialchars($row["nom"])." - ".htmlspecialchars($row["prix"])."$</option>";
            }
        } 
        ?>
        </select>
        <br/>
                <input class="btn btn-success btn-lg" type="submit" value="commander">
    </fieldset>
</form>        
        
