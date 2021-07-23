<?php
require 'Admin/inc/function.php';

$articles = getArticles();
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Blog Remise à niveau</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Remise a niveau suite aux vacances">
    <link rel="stylesheet" href="style.css">


    <h1>Titre du blog</h1>

    <div class="artFus row ">
        <?php foreach ($articles as $article): ?>
            <div class="Art-fus col-md-4">
                <div class="card">
                    <div class="card-body">
                        <h2><?= $article['name'] ?></h2>
                        <a href="article.php?id=<?= $article['id'] ?>">Lire la suite</a>
                    </div>
                </div>
            </div>
        <?php endforeach; ?>
    </div>
</head>
<body>

</body>
</html>