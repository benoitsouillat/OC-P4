<?php
session_start();
require_once(__DIR__ . '/data/bdd.php');
require_once(__DIR__ . '/data/requests.php');
require_once(__DIR__ . '/includes/header.php');
if (!empty($_SESSION['messages'])) {
    echo "<div class='message message--error'>";
    foreach ($_SESSION['messages'] as $message) {
        echo sprintf("<p> %s </p>", $message);
    }
    echo "</div>";
}
if (empty($_SESSION['post'])) {
    $_SESSION['post']['titre'] = '';
    $_SESSION['post']['artiste'] = '';
    $_SESSION['post']['image_url'] = '';
    $_SESSION['post']['description'] = '';
}

?>

<form action="data/traitement.php" method="POST">
    <div class="champ-formulaire">
        <label for="titre">Titre de l'œuvre</label>
        <input type="text" name="titre" id="titre" value="<?php echo $_SESSION['post']['titre']; ?>">
    </div>
    <div class="champ-formulaire">
        <label for="artiste">Auteur de l'œuvre</label>
        <input type="text" name="artiste" id="artiste" value="<?php echo $_SESSION['post']['artiste']; ?>">
    </div>
    <div class="champ-formulaire">
        <label for="image">URL de l'image</label>
        <input type="url" name="image_url" id="image_url" value="<?php echo $_SESSION['post']['image_url']; ?>">
    </div>
    <div class="champ-formulaire">
        <label for="description">Description</label>
        <textarea name="description" id="description"><?php echo $_SESSION['post']['description']; ?></textarea>
    </div>
    <input type="submit" value="Valider" name="submit">
</form>

<?php
$_SESSION = [];
require_once './includes/footer.php';

?>