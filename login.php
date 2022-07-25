<!doctype html>
<html lang="fr">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <title>STOCK DE GRAINES</title>
  </head>
  <body>
      

    <?php

    // methode pour utiliser la connexion en php sans BDD
    require "check.php";

    ?>

<div class="container">

    <div class="mt-5 row">

    <h1 class="text-center mt-5 py-5 display-4 bg-light">Bienvenue sur votre Application de Gestion des Semences.</h1>

    <h3 class="text-center mt-5">Connectez-vous</h3>

    <!-- Formulaire de connexion -->
    <form method="POST">


        <div class="mb-3 row mx-auto">

            <div class="col-sm-8 mx-auto">
                <input type="text" class="form-control" name="user" placeholder="Entrez votre login ici" required>
            </div><br><br>
            
            <div class="col-sm-8 mx-auto">
            <input type="password" class="form-control" id="inputPassword" name="password" placeholder="Entrez votre mot de passe ici" required>
            </div>
</div>

        <div class="text-center">
            <input type="submit" class="btn btn-primary mb-3" value="Se connecter"></input>
        </div>

    </form>

    <div class="text-center text-danger"><?php if(isset($error)) {

echo $error;
} ?></div>


    
</div>

</div>

</div>

</div>

    
    <!-- Optional JavaScript -->
    <!-- Popper.js first, then Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
 
  
  </body>
</html>