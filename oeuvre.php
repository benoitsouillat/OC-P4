<?php
require_once(__DIR__ . "/data/bdd.php");
require_once(__DIR__ . "/data/requests.php");
require_once("./includes/header.php");
$index = $_GET['id'] - 1;
$path = $pathImg . $oeuvres[$index]['image_url'];
?>
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
<?php require_once('./includes/footer.php') ?>