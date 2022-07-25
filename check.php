<?php

// liste des utilisateurs et mot de passe
$users = [

    "Maxime" => "test",
    "Maxence" => "test1"
];

// On demarre le système de session
session_start();

//On vérifie le login
if(isset($_POST['user']) && !isset($_SESSION['user'])) {

    //On check le password
    if($users[$_POST['user']] == $_POST['password']) {

        // On connecte l'user dans la session
        $_SESSION['user'] = $_POST['user'];

    } else {

        $error = "Veuillez entrer les bons identifiants";
    }
    


}

// Si erreur
if(isset($_SESSION['user'])) {

    $error = true;
    
}

// Si tout est ok
if(isset($_SESSION['user'])) {

    header('location:index.php');
    exit();
}