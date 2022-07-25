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

  <h1 class="text-center py-3 display-4">Bienvenue</h1>


  <!-- logout -->
  <div class="text-center py-3">
  <form method="POST">
      <input type="hidden" name="logout" value="1">
      <input type="submit" value="Se deconnecter">

  </form>
  </div>


    <main class="mx-2">
        <div class="p-5 mb-4 bg-light rounded-3">
            <h1 class="display-4">STOCK DE GRAINES</h1>
            <p class="lead">Création d'une petite interface toute simple permettant de visualiser les semances de ma base de données, mais aussi de les ajouter et de les supprimer !</p>
        </div>
       
        <div class="row">
            <div class="col-12 col-md-8">
                <table class="table table-striped table-bordered">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Nom</th>
                        <th scope="col">Date de plantation</th>
                        <th scope="col">Date de récolte</th>
                        <th scope="col">Conseil</th>
                        <th scope="col">Quantité</th>
                        <th scope="col">Famille</th>
                        <th scope="col">Suppression</th>
                    </tr>
                </thead>
                <tbody>

                
                    <!-- TODO #1 boucler sur le tableau $semanceList contenant toutes les semances -->
                    
                    <?php foreach ($semanceList as $semance) : ?>

                    <tr>
                        <td><?= $semance['id'] ?></td>
                        <td><?= $semance['name'] ?></td>
                        <td><?= $semance['planting'] ?></td>
                        <td><?= $semance['harvest'] ?></td>
                        <td><?= $semance['advice'] ?></td>
                        <td><?= $semance['amount'] ?></td>
                        <td><?= $familyList[ $semance ['family_id' ]]?></td>
                        <td>
                            <a href="supprimer.php?semanceDelete=<?= $semance['id'] ?>" class="btn btn-success">Supprimer</a>
                        </td>

                        

                    </tr>
                        
                    <?php endforeach; ?>
                    
                </tbody>
                </table>
            </div>
            <div class="col-12 col-md-4">
                <div class="card">
                    <div class="card-header">Ajout</div>
                    <div class="card-body">
                        <form action="" method="post">
                            <div class="mb-3">
                                <label for="name">Nom</label>
                                <input type="text" class="form-control" name="name" id="name" placeholder="">
                            </div>
                            <div class="mb-3">
                                <label for="planting_date">Date de plantation</label>
                                <input type="text" class="form-control" name="planting" id="planting" placeholder="">
                            </div>
                            <div class="mb-3">
                                <label for="harvest">Date de récolte</label>
                                <input type="text" class="form-control" name="harvest" id="harvest" placeholder="">
                            </div>
                            <div class="mb-3">
                                <label for="advice">Conseil</label>
                                <input type="text" class="form-control" name="advice" id="advice" placeholder="">
                            </div>
                            <div class="mb-3">
                                <label for="amount">Quantité</label>
                                <input type="number" class="form-control" name="amount" id="amount" placeholder="">
                            </div>
                            <div class="mb-3">
                                <label for="family">Famille</label>
                                <select class="form-select" id="family" name="family">
                                    <option>-</option>
                                    <?php foreach ($familyList as $currentFamilyId=>$currentFamilyName) : ?>
                                    <option value="<?= $currentFamilyId ?>"><?= $currentFamilyName ?></option>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                            <div class="d-grid">
                                <button type="submit" class="btn btn-success">Ajouter</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <div class="container ">

        <h1 class="text-center mt-5 py-5">Exporter en CSV</h1>

        <div class="row mx-auto">

            <div class="col-md-12 head mx-auto">

                <div class="text-center">

                    <a href="export-csv.php" class="btn btn-success">exporter</a>
                    
                </div>

            </div>

            <div class="col-12 col-md-8 mt-5 mx-auto">
                <table class="table table-striped table-bordered mx-auto mb-5">
                <thead>
                    <tr>
                        <th scope="col">Pense bête</th>
                        <th scope="col">Nom</th>
                        <th scope="col">Date de plantation</th>
                        <th scope="col">Date de récolte</th>
                    </tr>
                </thead>
                <tbody>

                    <?php

                    $pdoDBConnexion = new PDO($dataSourceName, $username, $password, $options);

                    // Préparation de la requete
                    $stmt = $pdoDBConnexion->prepare('SELECT * FROM semance ORDER BY id ASC');

                    // Execution de la requête
                    $executeOk = $stmt->execute();
                    // var_dump($executeOk);

                    if(!empty($stmt)) {

                        foreach($semanceList as $semance) { 
                   
                        //var_dump($semance);

                    ?>

                    <tr>
                        <td><?= $semance['id'] ?></td>
                        <td><?= $semance['name'] ?></td>
                        <td><?= $semance['planting'] ?></td>
                        <td><?= $semance['harvest'] ?></td>
                        
                    </tr>

                    <?php

                    }
                }

                ?>
                    
                    
                </tbody>
                </table>
            </div>

        </div>
    </main>

    <!-- Optional JavaScript -->
    <!-- Popper.js first, then Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
  </body>
</html>
