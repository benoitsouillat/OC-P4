<?php
require_once(__DIR__ . "/data/bdd.php");
require_once(__DIR__ . "/data/requests.php");
require_once(__DIR__ . "/includes/header.php");
$stmt = $pdo->prepare(getOneOeuvre());
$stmt->bindValue(':id', $_GET['id']);
$stmt->execute();
$oeuvre = $stmt->fetch(PDO::FETCH_ASSOC);

if (empty($oeuvre['id'])) {
    echo "<p>Le numéro de l'oeuvre demandée n'existe pas</p><br>
    <a href='/' title='accueil'>Retourner à l'accueil</a></main>";
} else {
    $path = $pathImg . $oeuvre['image_url'];
?>
<article id="detail-oeuvre">
    <div id="img-oeuvre">
        <?php echo '<img src="' . $path . '" alt="' . $oeuvre['image_alt'] . '">'; ?>
    </div>
    <div id="contenu-oeuvre">
        <h1>
            <?php echo $oeuvre['titre']; ?>
        </h1>
        <p class="description">
            <?php echo $oeuvre['artiste']; ?>
        </p>
        <p class="description-complete">
            <?php echo $oeuvre['description']; ?>
        </p>
    </div>
</article>

</main>
<?php
}
require_once('./includes/footer.php') ?>