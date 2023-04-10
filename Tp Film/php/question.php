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

// requete
$user = $_SESSION['user'];

$newPDO = new PDO('mysql:host=127.0.0.1;dbname=cinema', 'root', '');

$requete = $newPDO->prepare('SELECT libelle FROM questions INNER JOIN users ON users.idQ = questions.id WHERE email = :emailParam');
$requete->bindParam("emailParam", $user);
$requete->execute();
$libelle = $requete->fetch();
?>

<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="question.css" rel="stylesheet">
    <title>Reponse</title>
    <link rel="stylesheet" href="https://bootswatch.com/5/vapor/bootstrap.css">
    <style>
        body {
            margin: 0;
            background-color: #f5f5f5;
        }

        #container {
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
            padding: 0 20px;
        }

        form {
            max-width: 500px;
            padding: 20px;
            border: 1px solid #ccc;
            border-radius: 5px;
        }
    </style>
</head>

<body>
    <div id="container">
        <form class="p-3" action="bsup.php" method="POST">
            <div class="mb-3">
                <?php echo '<h1> Question : </h1>' . $libelle['libelle']; ?>
                <br><br>
                <h1>Reponse</h1>
                <label><b>Reponse :</b></label>
                <input type="text" placeholder="Entrer votre réponse" name="reponses" required>
                <input type="submit" id='submit' value='LOGIN' name="submit2">
            </div>
            <?php
            $requeteR = $newPDO->prepare('SELECT reponse FROM questions INNER JOIN users ON users.idQ = questions.id WHERE email = :emailParam');
            $requeteR->bindParam("emailParam", $user);
            $requeteR->execute();
            if (isset($_POST['submit2'])) {
                $reponse = $_POST['reponses'];
                while ($donnee = $requeteR->fetch()) {
                    if ($reponse == $donnee['reponse']) {
                        header("Location: index.php");
                        
                    } else {
                        die("Mauvaise réponse, veuillez ressayer ! ");
                    }
                }
            }
            ?>
        </form>
    </div>
</body>

</html>
