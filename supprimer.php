<?php 

// Inclusion du fichier s'occupant de la connexion à la DB
require __DIR__.'/inc/db.php'; // Pour __DIR__ => http://php.net/manual/fr/language.constants.predefined.php




$pdoDBConnexion = new PDO($dataSourceName, $username, $password, $options);

// Préparation de la requete
$results = $pdoDBConnexion->prepare('DELETE FROM semance WHERE id=:num LIMIT 1');

// Liaison du paramêtre dans le lien
$results->bindValue(':num', $_GET['semanceDelete'], PDO::PARAM_INT);

// Execution de la requête
$executeOk = $results->execute();

// Test de réussite de la suppression
if($executeOk) {

    header('location: index.php');
}




?>