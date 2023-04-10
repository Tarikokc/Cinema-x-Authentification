<?php

session_start();

$hostname = 'localhost'; // nom ou IP du serveur
$username = 'root';                // nom de l'utilisateur
$password = '';               // mot de passe de l'utilisateur
$bdd = 'cinema';     // nom de la base de données

$connexion = new mysqli($hostname, $username, $password);

if ($connexion ->connect_error) {
   die("ERREUR : Impossible de se connecter. " . $connexion ->connect_error);
}

// on recupere ce qu'on a ecrit
if (isset($_POST['submit'])){
    $nomUtilisateur = $_POST['email'];
    $motdePasse = $_POST['motdepasse'];


}
// requete
$newPDO = new PDO('mysql:host=127.0.0.1;dbname=cinema', 'root', '');
$req = $newPDO->prepare('SELECT email, motdepasse FROM users WHERE email =:emailParam AND motdepasse = :mdpParam');
$req->bindParam("emailParam",$nomUtilisateur);
$req->bindParam("mdpParam",$motdePasse);

$req->execute();


$nomUtilisateur = mysqli_real_escape_string($connexion, htmlspecialchars($_POST['email']));
$motdePasse = mysqli_real_escape_string($connexion, htmlspecialchars($_POST['motdepasse']));

// On teste si les valeurs correspondent
while ($don = $req->fetch()) {
    if ($nomUtilisateur == $don['email'] and $motdePasse == $don['motdepasse']){
        $_SESSION['user'] = $nomUtilisateur;
        header("Location: ../php/film.php");
    }else{
        die("Erreur, mot de passe ou email incorrect");
    }

}






