<?php

// TODO #1 créer un objet PDO permettant de se connecter à la base de données "semance"
// et le stocker dans la variable $pdo
// en utilisant la méthode "try/catch"


try {

  // on configure notre connexion à la BDD
  $dataSourceName = 'mysql:dbname=semance;host=localhost;charset=UTF8';
  $username = 'semance'; // identifiant utilisateur SQL
  $password = 'semance';  // mot de passe utilisateur SQL
  $options = [PDO::ATTR_ERRMODE => PDO::ERRMODE_WARNING]; // en prod on passe sur PDO::ERRMODE_SILENT

  // on créé la connexion
  $pdoDBConnexion = new PDO($dataSourceName, $username, $password, $options);

} catch (PDOException $exception) {

  // on affiche le message d'erreur
  echo "😢 Connexion échouée : " . $exception->getMessage();

}


