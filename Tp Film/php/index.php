<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Page d'accueil</title>
  <link rel="stylesheet" href="https://bootswatch.com/5/vapor/bootstrap.css">

  <style>
    body {
            height: 100vh;
            background-color: #f2f2f2;
        }
  </style>
</head>

<body>

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
?>


<nav class="navbar navbar-expand-lg navbar-dark bg-light">
 
  <div class="container-fluid">
    <a class="navbar-brand" href="#">Cinema</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarColor01" aria-controls="navbarColor01" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
      <ul class="navbar-nav me-auto">
        <li class="nav-item">
          <a class="nav-link active " href="allFilm.php">Films
            <span class="visually-hidden">(current)</span>
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link active " href="film.php">Catégories Films
            <span class="visually-hidden">(current)</span>
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link active" href="login.php">Mon Compte</a>
        </li>
        <li class="nav-item dropdown">
          <div class="dropdown-menu">
            <a class="dropdown-item" href="#">Action</a>
            <a class="dropdown-item" href="#">Another action</a>
            <a class="dropdown-item" href="#">Something else here</a>
            <div class="dropdown-divider"></div>
            <a class="dropdown-item" href="#">Separated link</a>
          </div>
        </li>
      </ul>
      <form class="d-flex">
        <input class="form-control me-sm-2" type="rechercher" placeholder="Rechercher">
        <button class="btn btn-secondary my-2 my-sm-0" type="submit">Rechercher</button>
      </form>
    </div>
  </div>
</nav>

<h1>Films à l'affiche : </h1>
<div id="carouselExampleControls" class="carousel slide" data-bs-ride="carousel">
  <div class="carousel-inner">
    <?php
      $i = 0;
      foreach ($films as $film) {
        $active = $i == 0 ? 'active' : ''; // Ajoute la classe active à la première slide
        if ($i % 4 == 0) { // Ajoute une nouvelle slide toutes les 4 cartes
          echo '<div class="carousel-item ' . $active . '">';
          echo '<div class="row">';
        }
    ?>
    <div class="col-md-3">
      <div class="card">
        <?php echo '<img src="img/' . $film['affiche'] . '" alt="' . $film['titre'] . '" class="card-img-top">';?>
        <div class="card-body">
          <h5 class="card-title"><?php echo $film['titre']; ?></h5>
          <a href="#" class="btn btn-primary">Voir plus</a>
        </div>
      </div>
    </div>
    <?php
        $i++;
        if ($i % 4 == 0) { // Ferme la slide et la row toutes les 4 cartes
          echo '</div>';
          echo '</div>';
        }
      }
      if ($i % 4 != 0) { // Ferme la dernière slide et la row si nécessaire
        echo '</div>';
        echo '</div>';
      }
    ?>
  </div>
  <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-bs-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="visually-hidden">Précédent</span>
  </a>
  <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-bs-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="visually-hidden">Suivant</span>
  </a>
</div>



</body>

</html>



