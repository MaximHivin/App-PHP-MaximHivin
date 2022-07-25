<?php

// Inclusion de Kint ( Kint permet d'avoir un var_dump plus stylé, mieux organisé)
require __DIR__.'/inc/kint.phar';

// Inclusion du fichier s'occupant de la connexion à la DB (TODO)
require __DIR__.'/inc/db.php'; // Pour __DIR__ => http://php.net/manual/fr/language.constants.predefined.php
// Rappel : la variable $pdo est disponible dans ce fichier
//          car elle a été créée par le fichier inclus ci-dessus

//Protection de la page

session_start();

//logout
if(isset($_POST['logout'])) {

    unset($_SESSION['user']);
}

// Retour à la page de connexion
if(!isset($_SESSION['user'])) {

    header('location: login.php');
    exit();
}

// Initialisation de variables (évite les "NOTICE - variable inexistante")
$semanceList = array();
$familyList = array();
$row = array();
$name = '';
$planting = '';
$harvest = '';
$advice = '';
$amount = '';
$family = '';

// Si le formulaire a été soumis
if (!empty($_POST)) {
    // Récupération des valeurs du formulaire dans des variables
    $name = isset($_POST['name']) ? $_POST['name'] : '';
    $planting= isset($_POST['planting']) ? $_POST['planting'] : '';
    $harvest = isset($_POST['harvest']) ? $_POST['harvest'] : '';
    $advice = isset($_POST['advice']) ? $_POST['advice'] : '';
    $amount = isset($_POST['amount']) ? $_POST['amount'] : '';
    $family = isset($_POST['family']) ? intval($_POST['family']) : 0;

    // TODO #3 valider les données reçues (ex: donnée non vide)
  

    if (
        $name === '' ||
        $planting === '' ||
        $harvest === '' ||
        $advice === '' ||
        $amount === '' ||
        $family === 0
    ) {
        
        exit('❌ merci de bien remplir tous les champs svp 🙏');

    }



    // Insertion en DB d'une semance
    $insertQuery = "
        INSERT INTO semance (name, planting, harvest, advice, amount, family_id)
        VALUES ('$name', '$planting', '$harvest', '$advice', '$amount', '$family')
    ";
    // TODO #3 exécuter la requête qui insère les données
    // TODO #3 une fois inséré, faire une redirection vers la page "app.php" (fonction header)
    

// ce n'est pas une requête SQL de type SELECT
    // donc nous allons passer par la méthode exec(), pour
    // 1. envoyer la requête + récupérer le nombre de lignes affectées
    $insertedRows = $pdoDBConnexion->exec($insertQuery); // retourne le nombre de lignées affectées
    // var_dump($insertedRows);
    
    // est-ce qu'une entrée à bien été insérée dans ma BDD ?
    if ($insertedRows === 1) {
        
        // oui, une entrée a bien été insérée dans la BDD

        // on redirige (on recharge) la page index.php
        // https://www.php.net/manual/fr/function.header.php
        // attention à l'écriture de l'entête, très pointilleuse
        // en effet :
        // header('Location: index.php');  // fonctionne
        // header('Location : index.php'); // déclenche un Internal Server Error
        header('Location: index.php');
        // on s'assure que la suite du code ne soit pas exécutée une fois la redirection effectuée
        exit;

    } else {

        // non, une entrée n'a pas été insérée dans la BDD
        exit('❌ erreur, semence non ajouté à la BDD');

    }



    
}

// Liste des familles
// TODO #4 récupérer cette liste depuis la base de données

$familyList = array(
    1 => 'Solanacées',
    2 => 'Cucurbitacées',
    3 => 'Légumineuses',
    4 => 'Pédaliacées'
);

// on créé une requête SQL
$sql = '
    SELECT *
    FROM `family`
';

// on envoie cette requête SQL de type SELECT, avec query()
$pdoStatement = $pdoDBConnexion->query($sql);

// on récupère les résultats de la requête avec fetchAll()
$results = $pdoStatement->fetchAll(PDO::FETCH_ASSOC); // nom des colonnes, comme clés


// debug avec Kint
// d($familyList, $results);


// Il va falloir passer par un nouveau tableau
foreach( $results as $family ) {

    // on extrait les valeurs
    $id = $family['id'];
    $name = $family['name'];

    // on les ajoute au tableau $familyList
    $familyList[$id] = $name;

}

// debug avec le var_dump de Kint
// d($familyList);


// TODO #1 écrire la requête SQL permettant de récupérer les semances en base de données

 // on créé une requête SQL
 $sql = '
 SELECT * FROM `semance';


// TODO #1 exécuter la requête ( SELECT par la methode query()) contenue dans $sql et récupérer les valeurs dans la variable $semanceList


// Envoyer la requête : 
$pdoStatement = $pdoDBConnexion->query($sql);

// Récuperer les résultats : 
$semanceList = $pdoStatement->fetchAll(PDO::FETCH_ASSOC);

// debug via Kint 
// d($semanceList);

// debug via Var_dump()
// var_dump($semanceList);




// Inclusion du fichier s'occupant d'afficher le code HTML
require __DIR__.'/semance.php';






