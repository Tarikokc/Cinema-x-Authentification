<?php

session_start();
$hostname = 'localhost'; // nom ou IP du serveur
$username = 'root';                // nom de l'utilisateur
$password = '';               // mot de passe de l'utilisateur
$bdd = 'cinema';     // nom de la base de données

$connexion = new mysqli($hostname,$username,$password);

if($connexion == false){
    die("ERREUR : Impossible de se connecter. " . mysqli_connect_error());
}

$newPDO = new PDO('mysql:host=127.0.0.1;dbname=cinema','root','');

if (isset ($_POST['submit'])){
    $nom_utilisateur = $_POST['username'];
    $motdepasse = $_POST['motdepasse'];
    $email = $_POST['email'];
    $libelle = $_POST['questions'];
    $reponse = $_POST['reponses'];
    echo "Vous êtes connecté ! ";
    echo"<br>";

    $requetteQuestions =$newPDO->prepare("INSERT INTO `questions`(`id`, `libelle`, `reponse`) VALUES (NULL,'$libelle','$reponse')");
    $requetteQuestions->execute();

    $requeteUsers = $newPDO->prepare("INSERT INTO `users` (`id`, `idQ`, `username`, `email`, `motdepasse`) VALUES (NULL, NULL,'$nom_utilisateur', '$email', '$motdepasse');)");
    $requeteUsers->execute();

    header("Location: ../php/film.php");
    exit();
}





