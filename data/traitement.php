<?php

require_once(__DIR__ . '/bdd.php');
require_once(__DIR__ . '/requests.php');

$messages = [];
$urlFormat = "/https://^[A-z]";

if (empty($_POST['titre'])) {
    array_push($messages, "Le titre de l'oeuvre doit être indiqué. <br> ");
}
if (empty($_POST['artiste'])) {
    array_push($messages, "Merci d'indiquer le nom de l'artiste. <br> ");
}
if (strlen($_POST['description']) < 3) {
    array_push($messages, "La description ne peut pas être vide et doit contenir au moins 3 caractères. <br> ");
}
if (empty($_POST['image_url'] /* || !preg_match($urlFormat, $_POST['image_url']) */)) {
    array_push($messages, "Veuillez renseigner le lien complet de l'image au format <strong>https://</strong>. <br> ");
}

session_start();
$_SESSION = [];
if (!empty($messages)) {
    $_SESSION['messages'] = $messages;
    $_SESSION['post'] = $_POST;
    header('Location: /ajouter.php');
} else {
    try {
        $stmt = $pdo->prepare(createOeuvre());
        $stmt->bindValue(':titre', $_POST['titre']);
        $stmt->bindValue(':artiste', $_POST['artiste']);
        $stmt->bindValue(':description', $_POST['description']);
        $stmt->bindValue(':image_alt', $_POST['titre']);
        $stmt->bindValue(':image_url', $_POST['image_url']);
        $stmt->execute();
        header("Location: /index.php?message=success");
    } catch (PDOException $e) {
        echo "Une erreur est subvenue : " . $e;
    }
}
