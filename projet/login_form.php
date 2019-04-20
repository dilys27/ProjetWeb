<?php
$title="Authentification";
include("header.php");

echo "<p class=\"error\">".($error??"")."</p>";
?>
<style>
    h1{
        color: white;
    }
    
    td{
        color: white;
    }
</style>
<div class="container">
    <div class='center'>
        <h1>Authentifiez-vous</h1>

                    <form method="post">
                        <!--legend>Authentifiez-vous</legend-->
                        <table class="center">
                            <tr>
                            <td><label for="inputNom" class="control-label">Login</label></td>
                            <td><input type="text" name="login" size="20" class="form-control" id="inputLogin" required placeholder="login"
                                   required value="<?= $data['login']??"" ?>"></td>
                            </tr>
                            <tr>
                            <td><label for="inputMDP" class="control-label">MDP</label></td>
                            <td><input type="password" name="password" size="20" class="form-control" required id="inputMDP"
                                   placeholder="Mot de passe"></td>
                            </tr>
                        </table>
                        <div class="form-group">
                            <button type="submit" class="btn btn-success btn md">Connexion</button>
                           
                            <span class="pull-center"><a class="btn btn-primary btn md" href="<?= $pathFor['adduser'] ?>">S'inscrire</a></span>
                        </div>
                    </form>
    </div>
    </div>
<?php

include("footer.php");