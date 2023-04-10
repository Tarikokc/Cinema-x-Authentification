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
<nav class="navbar navbar-expand-lg navbar-dark bg-light">
  <div class="container-fluid">
    <a class="navbar-brand" href="#">Cinema</a>
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

</body>

</html>