!DOCTYPE html>
<html lang="fr">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="../../favicon.ico">

    <title><?= $title??"" ?></title>
      <style>
body {background-image:url(css/image/bg_u.jpg);}
          p{font-weight: 600;}
    </style>
     <!-- Bootstrap core CSS -->
    <link href="bootstrap-3.3.7-dist\css\bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="starter-template.css" rel="stylesheet">

      
    <!-- Bootstrap core CSS -->
    <link href="../../dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <link href="../../assets/css/ie10-viewport-bug-workaround.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="jumbotron.css" rel="stylesheet">

   
  </head>

  <body>

    <nav class="navbar navbar-inverse navbar-fixed-top">
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="index.php">Restaurant Pizzeria Dal Erte</a>
        </div>
        
          <div id="navbar" class="navbar-collapse collapse">
          <ul class="nav navbar-nav">
            <li class="active"><a href="home.php">Accueil</a></li>
            <li><a href="liste_p.php">Pizzas</a></li>
              <li><a href="liste_s.php">Suppléments</a></li>
              <li><a href="espace_membre.php">Espace membre</a>
              </li>
            <li><a href="contact.php">Contact</a></li>
          </ul>
      
        <form class="navbar-form navbar-left">
                <p><a class="btn btn-danger btn-md" href="logout.php" title="Se deconnecter">Se deconnecter &raquo;</a></p>
           </form>
          <form method="get" action="recherche.php" class="navbar-form navbar-right">
            <div class="form-group">
              <input type="text" placeholder="Recherche de pizzas..." name="rech" class="form-control">
            </div>
            <button type="submit" 
            value= "OK" class="btn btn-success">OK</button>
          </form>
            
        </div><!--/.navbar-collapse -->
      </div>
    </nav>
