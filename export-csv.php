<?php

// Inclusion du fichier s'occupant de la connexion à la DB (TODO)
require __DIR__.'/inc/db.php'; // Pour __DIR__ => http://php.net/manual/fr/language.constants.predefined.php
// Rappel : la variable $pdo est disponible dans ce fichier
//          car elle a été créée par le fichier inclus ci-dessus


// $pdoDBConnexion = new PDO($dataSourceName, $username, $password, $options);

// Préparation de la requete
$stmt = $pdoDBConnexion->prepare('SELECT * FROM semance ORDER BY id ASC');

// *******************************************************************************
// METHODE 1
// *******************************************************************************


    if (!empty($stmt)) {

        $filename = "pense_bete" . ".csv";

        // On crée un fichier à pointer
        $f = fopen('php://memory', 'w');

        // On crée nos colonnes
        $fields = array('ID', 'NAME', 'PLANTING', 'HARVEST');
        fputcsv($f, $fields);

        // On sort chaque ligne des données, on formate les lignes en csv et on écrit dans le pointeur de fichier
        while ($row = $stmt->fetchAll(PDO::FETCH_ASSOC)) {
            

            $lineData = array($row['id'], $row['name'], $row['planting'], $row['harvest']);
            fputcsv($f, $lineData);
            
        }


        // On revient au fichier de départ
        fseek($f, 0);

        // On défini des en-têtes pour télécharger le fichier plutôt que de l'afficher
        header('Content-Type: text/csv');
        header('Content-Disposition: attachement; filename="' . $filename . '";');

        // On affiche toutes les données restantes sur un pointeur de fichier
        fpassthru($f);
    }

exit();

// *******************************************************************************
// METHODE 2
// *******************************************************************************



// // HTTP Headers 
// header("Content-Type: Application/octet-stream");
// header("Content-Transfer-Encoding: Binary");
// header("Content-disposition: attachement; filename=\"export.csv\"");

// // Get Users + Output
// $stmt = $pdoDBConnexion->prepare("SELECT * FROM 'semance'");
// $stmt->execute();
// while($row = $stmt->fetch(PDO::FETCH_NAMED)) {
//     echo implode(",", [
//         $row['id'], $row['name'], $row['planting'], $row['harvest']
//     ]);
// }

// // NEXT ROW
// echo "\r\n";

