<?php
require_once(__DIR__ . "/includes/header.php");
require_once(__DIR__ . "/data/bdd.php");
require_once(__DIR__ . "/data/requests.php");
?>

<div id="liste-oeuvres">
    <?php
    if (isset($_GET['message']) && $_GET['message'] === 'success') {
        echo "<div class='message message--success'><p>Votre oeuvre a bien été ajoutée</p></div>";
    }
    $stmt = $pdo->prepare(getAllOeuvres());
    $stmt->execute();
    $oeuvres = $stmt->fetchAll(PDO::FETCH_ASSOC);

    foreach ($oeuvres as $oeuvre) {
        $path = $pathImg . $oeuvre['image_url'];
        echo '<article class="oeuvre">
                        <a href="oeuvre.php?id=' . $oeuvre['id'] . '">
                            <img src="' . $path . '" alt="' . $oeuvre['image_alt'] . '">
                            <h2>' . $oeuvre['titre'] . '<h2>
                            <p class="description">' . $oeuvre["artiste"] . "</p>
                        </a>
                    </article>";
    }
    ?>
</div>
</main>
<?php require_once('./includes/footer.php') ?>