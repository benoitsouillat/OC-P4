 <?php
    require_once(__DIR__ . "/includes/header.php");
    require_once(__DIR__ . "/data/bdd.php");
    require_once(__DIR__ . "/data/requests.php");
    ?>

 <div id="liste-oeuvres">
     <?php
        // require_once('./data/tableaux.php');
        $stmt = $pdo->prepare(getAllOeuvres());
        // $stmt->bindValue('id', ':id');
        // $stmt->bindValue('titre', ':titre');
        // $stmt->bindValue('artiste', ':artiste');
        // $stmt->bindValue('description', ':description');
        // $stmt->bindValue('image_alt', ':image_alt');
        // $stmt->bindValue('image_url', ':image_url');
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