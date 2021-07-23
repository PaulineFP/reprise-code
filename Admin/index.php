<?php

if(session_status() == PHP_SESSION_NONE){
    session_start();
}
require ('inc/db.php');

$pdo = pdo();

$result = "";


if (isset($_POST['submit'])) {
    if (empty($_POST["username"]) || empty($_POST["password"])) {
        echo 'Tous les champs sont requis';
        var_dump($result);
    }
    // Si tous les champs sont complétés
    if (!empty($_POST["username"]) && !empty($_POST["password"])) {
        $username=$_POST["username"];
        $password=$_POST["password"];

        $sth=$pdo->prepare('SELECT * FROM users WHERE username = :username AND password = :password');
        $sth->bindParam(':username', $username);
        $sth->execute(['username'=>$username, 'password'=>$password]);
        $result=$sth->fetch();
//        session_start();
//        // Permet de vérifier que la session est bien ouverte et que nous avons bien un utilisateur
//        $_SESSION['connecte'] = 1;
//        //Récupération du $username pour notre session en lien avec DataLogin
//        $_SESSION['username'] = "$username";



        if ($result == false) {
            echo "Vos identifiants ne sont pas correctes, veuillez les saisir à nouveau";
        } else {
                    session_start();

        $_SESSION['auth'] = $user;
        $_SESSION['flash']['success'] = 'Vous êtes maintenant bien connecter !';
            header('Location: administration.php');
        }
    }
}

 //Si tous les champs sont complétés
//if (!empty($_POST) && !empty($_POST['pseudo']) && !empty($_POST['password'])) {
//
//    $bdd = pdo();
//    $req = $bdd->prepare("SELECT * FROM users WHERE pseudo = :pseudo IS NOT NULL");
//    $req->execute(['pseudo' => $_POST['pseudo']]);
//    $user = $req->fetch(PDO::FETCH_OBJ);
//
//
//    if ($user && password_verify($_POST['password'], $user->password)) {
//
//        session_start();
//
//        $_SESSION['auth'] = $user;
//        $_SESSION['flash']['success'] = 'Vous êtes maintenant bien connecter !';
//
//        header('Location: /administration.php');
//
//    } else {
//        $_SESSION['flash']['danger'] = 'Vos identifiants sont incorrect !';
//    }
//}
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
<h2>CONNECTEZ-VOUS</h2>

<div class="form">

    <form action="#" method="POST">
        <div class="form-group col-md-6">
            <label for="username"></label>
            <input type="text" name="username" placeholder="Nom">
        </div>

        <div class="form-group col-md-6">
            <label for="password"></label>
            <input type="password" name="password" placeholder="Mot de passe">
        </div>

        <div>
            <button class="btn-info btn-margin" type="submit" value="Add" name="submit">Envoyer</button>
        </div>

    </form>

</div>

<!---->
<!--    <div class="container">-->
<!---->
        <!--message d'erreur-->
<!---->
<!--        --><?php //if(isset($_SESSION['flash'])):?>
<!---->
<!--            --><?php //foreach($_SESSION['flash'] as $type => $message):?>
<!---->
<!--                <div class="alert---><?//= $type; ?><!--">-->
<!--                    --><?//= $message; ?>
<!--                </div>-->
<!---->
<!--            --><?php //endforeach; ?>
<!---->
            <!--Ensuite je supprime le message d'erreur-->
<!---->
<!--            --><?php //unset($_SESSION['flash']); ?>
<!---->
<!--        --><?php //endif; ?>
<!---->
<!--        <div class="text-center login">-->
<!--            --><?php //if(!empty($errors)): ?>
<!--                <div class="alert alert---><?//= $type; ?><!--">-->
<!--                    <p>Vous n'avez pas rempli le formulaire correctement</p>-->
<!--                    --><?php //foreach($errors as $error):?>
<!--                    <ul>-->
<!--                        <li>--><?//= $error; ?><!--</li>-->
<!--                        --><?php //endforeach; ?>
<!--                    </ul>-->
<!--                </div>-->
<!--            --><?php //endif; ?>
<!--            <main class="form-signin loginBg">-->
<!---->
<!--                <form action="" method="post">-->
<!--                    <h1 class="h3 mb-3 fw-normal">Connection à l'espace administrateur</h1>-->
<!---->
<!--                    <label for="" class="visually-hidden">username</label>-->
<!--                    <input type="text" name="pseudo"  placeholder="username" />-->
<!---->
<!---->
<!--                    <label for="inputPassword" class="visually-hidden">Password</label>-->
<!--                    <input type="password" id="inputPassword" class="form-control"  name="password" placeholder="Mot de passe" required>-->
<!---->
<!--                    <button class="w-100 btn btn-lg btn-primary" type="submit">Se connecter</button>-->
<!--                </form>-->
<!--            </main>-->
<!--        </div>-->
<!--    </div>-->
</body>
</html>
