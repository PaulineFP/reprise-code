<?php

//require 'inc/db.php';
require 'inc/function.php';


// If logged_only-> afficher l administration; else vous n'etes pas administrateur -> retour index.php
?>

<!doctype html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Connection administtration du site">
    <link rel="stylesheet" href="style.css">
    <title>Connection</title>
</head>
<body>


<?php if (isLogged()): ?>
    <h1>ADMIN</h1>

    <!--    Afficher articles / ajouter - modifier - suprimer un article-->

<?php endif; ?>

<!--MESSAGE-->
            <?php if(isset($_SESSION['flash'])&& logged_only() ):?>

                <?php foreach($_SESSION['flash'] as $type => $message):?>

                    <div class="alert-<?= $type; ?>">
                        <?= $message ?>
                    </div>
                <?php endforeach; ?>
            <?php endif; ?>

</body>
</html>