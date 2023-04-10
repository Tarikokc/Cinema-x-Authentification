    <!-- Icône de menu
    <div class="menu-icon">
    <span></span>
    <span></span>
    <span></span>
    </div> -->

    <!-- Menu -->
    <!-- <nav class="menu">
    <ul>
        <li><a href="#">Accueil</a></li>
        <li><a href="#">Films</a></li>
        <li><a href="#">Acteurs</a></li>
        <li><a href="#">A propos</a></li>
    </ul>
    </nav> -->
    
    <?php
    
    // Afficher du contenu PHP ici...

    // Inclure du code JavaScript
    // echo '<script type="text/javascript">
    //           // Sélectionnez l\'icône de menu et le menu
    //           const menuIcon = document.querySelector(\'.menu-icon\');
    //           const menu = document.querySelector(\'.menu\');

    //           // Ajoutez un événement de clic à l\'icône de menu
    //           menuIcon.addEventListener(\'click\', function() {
    //             // Basculez la classe \'open\' sur l\'icône de menu et le menu
    //             menuIcon.classList.toggle(\'open\');
    //             menu.classList.toggle(\'open\');
    //           });
    //         </script>';

    // function closeMenu() {
    //     echo '<script>
    //     var menuIcon = document.querySelector(\'.menu-icon\');
    //     var menu = document.querySelector(\'.menu\');
    //     menuIcon.classList.remove(\'open\');
    //     menu.classList.remove(\'open\');
    //     </script>';
    // }
    // ?>

    <?php
    // echo '<script type="text/javascript">
    // // Sélectionnez l'icône de menu et le menu
    // const menuIcon = document.querySelector('.menu-icon');
    // const menu = document.querySelector('.menu');

    // // Ajoutez un événement de clic à l'icône de menu
    // menuIcon.addEventListener('click', function() {
    // // Basculez la classe 'open' sur l'icône de menu et le menu
    // menuIcon.classList.toggle('open');
    // menu.classList.toggle('open');
    // });

    // </script>'';

    if (isset ($_POST['submit'])){
        $cate = $_POST['categories'];
        $annee = $_POST['an'];
        $duree = 0;
        
        if (isset($_POST['drone'])) {
            switch ($_POST['drone']) {
                case '+90':
                    $duree = 90;
                    break;
                case '+120':
                    $duree = +120;
                    break;
                case '-120':
                    $duree = -120;
                    break;
                default:
                    $duree = 0;
            }
        }
    
        // Affiche les films
        $film = $newPDO -> prepare('SELECT titre,affiche FROM `film`  
        INNER JOIN categorie ON film.cat = categorie.idcat
        WHERE libelle = :categoriesParam AND ansortie >= :anneesortieParam 
        AND CASE 
        WHEN :dureeParam = "+90" THEN film.duree >= 90 
        WHEN :dureeParam = "-120"
        THEN film.duree <= 120 ELSE film.duree >= 120 END');
    
        $film->bindParam("categoriesParam",$cate);
        $film->bindParam("anneesortieParam",$annee);
        $film->bindParam("dureeParam", $duree, PDO::PARAM_INT);
        $film->execute();
        $films = $film->fetchAll();
    
        foreach ($films as $film) {
            echo '<h2>'.$film['titre'].'</h2>';
            echo '<img src="'.$film['affiche'].'" alt="'.$film['titre'].'" width="200"><br>';
    
        }
        if (($cate == "rien" || $cate == null) && ($annee == "rienan" || $annee == null) && empty($_POST['drone'])) {
            // Si tous les champs du formulaire sont vides, afficher tous les films
            $film = $newPDO -> prepare('SELECT titre,affiche FROM film');
            $film->execute();
            $films = $film->fetchAll();
    
            foreach ($films as $film) {
                echo '<h2>'.$film['titre'].'</h2>';
                echo '<img src="'.$film['affiche'].'" alt="'.$film['titre'].'" width="200"><br>';
            }
        
        }
    
        
        
    
        
        echo '<a href="http://localhost/php_roos/Tp%20film/film.php" target="_blank">Revenir a la page précédente </a>';
    }
    
    ?>
    












    <script>
  $(document).ready(function(){
    $('.carousel').carousel({
      interval: 2000
    })
  });
</script>





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
