<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://bootswatch.com/5/vapor/bootstrap.css">
    <title>Login</title>
    <style>
        .container {
            display: flex;
            justify-content: center;
            align-items: center;
            
            height: 100vh;
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
    <div class="container">
        <form class="p-3" action="verification.php" method="POST">
            <h1 class="mb-4">Inscription</h1>
            
            <div class="mb-3">
                <label for="email" class="form-label">Entrez votre email :</label>
                <input type="email" class="form-control" id="email" name="email">
            </div>

            <div class="mb-3">
                <label for="username" class="form-label">Nom d'utilisateur :</label>
                <input type="text" class="form-control" id="username" name="username" required>
            </div>

            <div class="mb-3">
                <label for="password" class="form-label">Mot de passe :</label>
                <input type="password" class="form-control" id="password" name="motdepasse" required>
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
                <input type="submit" class="btn btn-primary" id='submit' value='LOGIN' name="submit">
            </div>
            
            <p>Vous possédez déjà un compte ? <a href="http://localhost/Tp film/Authentification/form_connexion.php">Connectez-vous !</a></p>
        </form>
    </div>
</body>
</html>
