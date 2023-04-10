<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Liste des films</title>
    <link rel="stylesheet" href="https://bootswatch.com/5/vapor/bootstrap.css">

    <style>
        body {
            height: 200vh;
            background-color: #f2f2f2;
        }
    </style>
</head>
<body class="d-flex justify-content-center align-items-center">

    
</body>
</html>









<?php
session_start();
$hostname = 'localhost'; // nom ou IP du serveur
$username = 'root';                // nom de l'utilisateur
$password = '';               // mot de passe de l'utilisateur
$bdd = 'cinema';     // nom de la base de données
$connexion = new mysqli($hostname, $username, $password);
if ($connexion->connect_error) {
    die("ERREUR : Impossible de se connecter. " . $connexion->connect_error);
}

$newPDO = new PDO('mysql:host=127.0.0.1;dbname=cinema', 'root', '');

$categorie = $newPDO->prepare('SELECT libelle FROM categorie');
$categorie->execute();


    // Affiche les films
    $sql = 'SELECT titre, affiche FROM film ';
    $params = array();


    $film = $newPDO->prepare($sql);
    $film->execute($params);
    $films = $film->fetchAll();

    // Utilisation de Bootstrap pour améliorer l'affichage des résultats
    echo '<div class="container">';
    echo '<div class="row">';
    foreach ($films as $film) {
        echo '<div class="col-md-4 mb-4">';
        echo '<div class="card">';
        echo '<img src="img/' . $film['affiche'] . '" alt="' . $film['titre'] . '" class="card-img-top">';
        echo '<div class="card-body">';
        echo '<h5 class="card-title">' . $film['titre'] . '</h5>';
        echo '</div>';
        echo '</div>';
        echo '</div>';
    }
    echo '</div>';
    echo '</div>';



    echo '<a class = "btn btn-primary position-relative"href="http://localhost/Tp film/php/" target="_blank">Retour à la page de sélection</a>';




// btn btn-primary position-relative