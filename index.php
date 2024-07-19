<!doctype html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="css/style.css">
    <title>The ArtBox</title>
</head>

<body>
    <?php include_once("./includes/header.php") ?>

    <main>
        <div id="liste-oeuvres">
            <?php
            require_once('./data/tableaux.php');
            foreach ($oeuvres as $oeuvre) {
                $path = $pathImg . $oeuvre['image_url'];
                echo '<article class="oeuvre">
                        <a href="oeuvre.php?id=' . $oeuvre['id'] . '">
                            <img src="' . $path . '" alt="' . $oeuvre['image_alt'] . '">
                            <h2>' . $oeuvre['nom de l\'oeuvre'] . '<h2>
                            <p class="description">' . $oeuvre["nom de l'artiste"] . "</p>
                        </a>
                    </article>";
            }
            ?>
        </div>
    </main>
    <?php include_once('./includes/footer.php') ?>
</body>

</html>