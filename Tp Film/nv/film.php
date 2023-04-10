<!DOCTYPE html>
<html>

<head>
    <title>Liste de Films</title>
    <link rel="stylesheet" href="https://bootswatch.com/5/vapor/bootstrap.css">
    <style>
        body {
            height: 100vh;
            background-color: #f2f2f2;
        }
    </style>
</head>

<body class="d-flex justify-content-center align-items-center">
    <div class="container w-50">
        <h1 class="text-center">Liste de Films</h1>

        <?php
        include 'verif_film.php';
        ?>

        <form class="form" action="verif_film.php" method="post">
            <div class="Ctg">
                <label for="categories">Catégorie :</label>
                <select class="form-select" id="exampleSelect1" name="categories" id="categories">
                    <?php
                    $categorie = $newPDO->prepare('SELECT libelle FROM categorie');
                    $categorie->execute();
                    echo '<option name=rien value=""</option>';

                    while ($row = $categorie->fetch()) {
                        echo '<option value="' . $row['libelle'] . '">' . $row['libelle'] . '</option>';
                    }
                    ?>
                </select>
            </div>

            <div class="Annee">
                <label for="an"> Après année :</label>
                <select class="form-select" id="exampleSelect1" name="an" id="an">
                    <?php
                    // Afficher les options de la liste déroulante
                    $annee_actuelle = date('Y');
                    echo '<option name=rienan value=""</option>';

                    for ($annee = 2000; $annee <= $annee_actuelle; $annee++) {
                        echo "<option value=\"$annee\">$annee</option>";
                    }
                    ?>
                </select>
            </div>

            <!-- <fieldset>
                <div class="duree">
                    <legend>Duree :</legend>
                    <div class="btn d-flex justify-content-center gap-2">
                        <div>
                            <input type="radio" id="90" name="drone" value="+90">
                            <label for="+90">+90 min</label>
                        </div>
                        <div>
                            <input type="radio" id="+120" name="drone" value="+120">
                            <label for="+120">+120 min </label>
                        </div>
                        <div>
                            <input type="radio" id="-120" name="drone" value="-120">
                            <label for="-120">-120 min</label>
                        </div>
                    </div>
                </div>
            </fieldset> -->
            <legend>Duree :</legend>
            <div class="btn d-flex justify-content-center gap-2" role="group" aria-label="Basic checkbox toggle button group">
                <input type="checkbox" class="btn-check" id="btncheck1" name ="drone" checked="" autocomplete="off">
                <label class="btn btn-primary" for="btncheck1">+90</label>
                <input type="checkbox" class="btn-check" id="btncheck2" name="drone" autocomplete="off">
                <label class="btn btn-primary" for="btncheck2">+120</label>
                <input type="checkbox" class="btn-check" id="btncheck3" name="drone" autocomplete="off">
                <label class="btn btn-primary" for="btncheck3">-120</label>
            </div>

            <br>
            <input class="btn btn-primary w-100" type="submit" id='submit' value='Envoyer' name="submit">
        </form>
    </div>
</body>

</html>