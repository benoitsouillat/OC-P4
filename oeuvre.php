<?php
require_once('./data/tableaux.php');
$index = $_GET['id'] - 1;
$path = $pathImg . $oeuvres[$index]['image_url']
?>
<!doctype html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="./css/style.css">
    <title>The ArtBox</title>
</head>

<body>
    <?php include_once("./includes/header.php") ?>
    <main>
        <article id="detail-oeuvre">
            <div id="img-oeuvre">
                <?php echo '<img src="' . $path . '" alt="' . $oeuvres[$index]['image_alt'] . '">'; ?>
            </div>
            <div id="contenu-oeuvre">
                <h1>
                    <?php echo $oeuvres[$index]['nom de l\'oeuvre']; ?>
                </h1>
                <p class="description">
                    <?php echo $oeuvres[$index]['nom de l\'artiste']; ?>
                </p>
                <p class="description-complete">
                    <?php echo $oeuvres[$index]['description complete']; ?>
                </p>
            </div>
        </article>

    </main>
    <?php include_once('./includes/footer.php') ?>
</body>

</html>