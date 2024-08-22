<?php
require_once(__DIR__ . "/data/bdd.php");
require_once(__DIR__ . "/data/requests.php");
require_once(__DIR__ . "/includes/header.php");
require_once(__DIR__ . "/data/functions.php");

$stmt = $pdo->prepare(getOneOeuvre());
$stmt->bindValue(':id', $_GET['id']);
$stmt->execute();
$oeuvre = $stmt->fetch(PDO::FETCH_ASSOC);

if (empty($oeuvre['id'])) {
    echo "<div class='message message--error'><p>Le numéro de l'oeuvre demandée n'existe pas</p><br>
    <a class='btn btn-gold' href='/' title='accueil'>Retourner à l'accueil</a></div></main>";
} else {
    $path = set_path_url($oeuvre['image_url']);
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