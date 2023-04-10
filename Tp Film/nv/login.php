<!DOCTYPE html>
<html>

<head>
    <title>Page de connexion</title>
    <script>
        // Fonction permettant de selectionner un des deux formulaire
        function showForm() {
            var selection = document.getElementById("formSelection");
            var formLogin = document.getElementById("formLogin");
            var formRegister = document.getElementById("formRegister");
            if (selection.value === "login") {
                formLogin.style.display = "block";
                formRegister.style.display = "none";
            } else if (selection.value === "register") {
                formLogin.style.display = "none";
                formRegister.style.display = "block";
            }
        }
    </script>
    <link rel="stylesheet" href="https://bootswatch.com/5/vapor/bootstrap.css">
    <style>
        body {
            height: 100vh;
            /* hauteur de la page entière */
            margin: 0;
            /* supprimer les marges par défaut */
            background-color: #f5f5f5;
            /* couleur de fond */
        }

        .container {
            display: flex;
            justify-content: center;
            align-items: center;

            height: 70vh;
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
    <nav class="navbar navbar-expand-lg navbar-dark bg-light">
        <div class="container-fluid">
            <a class="navbar-brand" href="index.php">Accueil</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarColor01" aria-controls="navbarColor01" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarColor01">
                <ul class="navbar-nav me-auto">
                    <li class="nav-item">
                        <a class="nav-link active " href="allFilm.php">Films
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
    <h1 class="text-center">Page de connexion</h1>

    <div class="container">


        <form class="p-3" action="verif_connexion.php" method="POST" id="formLogin" style="display: block;">

            <label for="formSelection">Choisissez une option :</label>
            <select id="formSelection" onchange="showForm()">
                <option value="login">Se connecter</option>
                <option value="register">S'inscrire</option>
            </select>


            <br><br>

            <div class="mb-3">
                <label for="username">Nom d'utilisateur:</label>
                <input type="text" id="username" name="username"><br><br>
            </div>

            <div class="mb-3">
                <label for="password">Mot de passe:</label>
                <input type="password" id="password" name="password"><br><br>
            </div>

            <div class="d-grid gap-2 mb-3">
                <button class="btn btn-primary w-100" type="submit" value='CONNEXION' name="submit">Connexion</button>
            </div>

        </form>

        <form class="p-3" action="verif_inscription.php" method="POST" id="formRegister" style="display: none;">
            <label for="formSelection">Choisissez une option :</label>
            <select id="formSelection" onchange="showForm()">
                <option value="login">Se connecter</option>
                <option value="register">S'inscrire</option>
            </select>
            <br><br>
            <div class="mb-3">
                <label for="name">Nom:</label>
                <input type="text" id="name" name="name"><br><br>
            </div>

            <div class="mb-3">
                <label for="prenom">Prenom:</label>
                <input type="text" id="prenom" name="prenom"><br><br>
            </div>

            <div class="mb-3">
                <label for="email">Adresse e-mail:</label>
                <input type="email" id="email" name="email"><br><br>
            </div>

            <div class="mb-3">
                <label for="password2">Mot de passe:</label>
                <input type="password" id="password2" name="password2"><br><br>


            </div>

            <div class="mb-3">
                <label for="pet-select" class="form-label">Question de sécurité :</label>
                <select class="form-select" name="questions" id="pet-select">
                    <option>Quel est votre animal préféré ?</option>
                    <option>Votre club préféré ?</option>
                    <option>Quel est le nom votre première école ?</option>
                    <option>Le nom de votre animal de compagnie ?</option>
                </select>
            </div>

            <div class="mb-3">
                <label for="reponse" class="form-label">Réponse :</label>
                <input type="text" class="form-control" id="reponse" name="reponses" required>
            </div>

            <div class="d-grid gap-2 mb-3">
                <button class="btn btn-primary w-100" type="submit1" value='INSCRIPTION' name="submit1">Inscription</button>
            </div>

        </form>
    </div>
</body>

</html>