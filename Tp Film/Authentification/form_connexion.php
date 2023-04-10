<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://bootswatch.com/5/vapor/bootstrap.css">
    <title>Login</title>
    <style>
       
        body {
            display: flex;
            align-items: center;
            justify-content: center;
            height: 100vh;

            
        }
        #container {
            max-width: 500px;
            padding: 20px;
            border: 1px solid #ccc;
            border-radius: 10px;
        }
        form {
            padding: 20px;
            border: 1px solid #ccc;
            border-radius: 5px;
        }
    </style>
</head>
<body>
    <div id="container">
        <!-- zone de connexion -->
        <form action="verification_Connexion2.0.php" method="POST">
            <h1>Connexion</h1>
            <div class="mb-3">
                <label for="email" class="form-label">Entrez votre email :</label>
                <input type="email" class="form-control" id="email" name="email">
            </div>
            <div class="mb-3">
                <label for="password" class="form-label">Mot de passe :</label>
                <input type="password" class="form-control" id="password" name="motdepasse" placeholder="Entrer le mot de passe" required>
            </div>
            <div class="d-grid gap-2 mb-3">
                <input type="submit" class="btn btn-primary" id='submit' value='LOGIN' name ="submit">
            </div>
            <p>Vous n'avez pas de compte ? <a href="http://localhost/Tp film/Authentification/index.php">Inscrivez-vous !</a></p>
        </form>
    </div>
</body> 
</html>
