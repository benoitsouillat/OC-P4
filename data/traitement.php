<?php

require_once(__DIR__ . '/bdd.php');
require_once(__DIR__ . '/requests.php');

$messages = [];
$urlFormat = "/^https:\/\/[a-zA-Z0-9._-]+(\/[a-zA-Z0-9._-]*)*$/";
// $extensionFormat = "/^.+\.(jpg|jpeg|png|webp|gif)$/";

if (empty($_POST['titre'])) {
    array_push($messages, "Le titre de l'oeuvre doit être indiqué. <br> ");
}
if (empty($_POST['artiste'])) {
    array_push($messages, "Merci d'indiquer le nom de l'artiste. <br> ");
}
if (strlen($_POST['description']) < 3) {
    array_push($messages, "La description ne peut pas être vide et doit contenir au moins 3 caractères. <br> ");
}
if (empty($_POST['image_url']) || !preg_match($urlFormat, $_POST['image_url'])) {
    array_push($messages, "Veuillez renseigner le lien complet de l'image au format <strong>https://</strong>. <br> ");
} /* elseif (!str_starts_with($_POST['image_url'], 'http') && !preg_match($extensionFormat, $_POST['image_url'])) {
    array_push($messages, "Vous devez entrez une extension valide <strong>(jpg, jpeg, png, webp, gif)</strong> ou une URL d'image externe <br>");
} */

session_start();
$_SESSION = [];
if (!empty($messages)) {
    $_SESSION['messages'] = $messages;
    $_SESSION['post'] = $_POST;
    header('Location: /ajouter.php');
} else {
    try {
        $stmt = $pdo->prepare(createOeuvre());
        $stmt->bindValue(':titre', htmlspecialchars($_POST['titre']));
        $stmt->bindValue(':artiste', htmlspecialchars($_POST['artiste']));
        $stmt->bindValue(':description', htmlspecialchars($_POST['description']));
        $stmt->bindValue(':image_alt', htmlspecialchars($_POST['titre']));
        $stmt->bindValue(':image_url', htmlspecialchars($_POST['image_url']));
        $stmt->execute();
        header("Location: /index.php?message=success");
    } catch (PDOException $e) {
        echo "Une erreur est subvenue : " . $e;
    }
}