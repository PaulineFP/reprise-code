<?php
require 'db.php';

//FONCTION QUI RECUPERE TOUS LES ARTICLES//
function getArticles()
{
    $bdd = pdo();
    $requete = $bdd->prepare('SELECT * FROM post WHERE ID ORDER BY create_at DESC');
    $requete->execute();
    $data = $requete->fetchAll();
    return $data;
}

//FONCTION QUI RECUPERE UN ARTICLE//
function getArticle($id)
{
    $bdd = pdo();
    $requete = $bdd->prepare('SELECT * FROM post WHERE id = ?');
    $requete->execute(array($id));
    if ($requete->rowCount() == 1)
    {
        $data = $requete->fetch();
        return $data;
    }
    /* else
         header('location: index.php');*/
}

//fonction pour le slug//

/*function getCategory() {
    $bdd = pdo();
    $requete = $bdd->prepare('SELECT category_name FROM category');
    $requete->execute();
    return $requete->fetchAll();
}
*/

//----------------------ADMIN-------------------



//FONCTION VERIFICATION CONNECTION DE L'UTILISATEUR
function logged_only()
{

    if (session_status() == PHP_SESSION_NONE) {
        session_start();
    }

    if (!isset($_SESSION['auth'])) {

        $_SESSION['flash']['danger'] = "Vous n'avez pas le droit d'acceder à cette page.";

        header('Location: /Admin/index.php');

        exit();
    }
}

//FONCTION DECONNECTION
function logout()
{
unset($_SESSION{'auth'});

$_SESSION['flash']['success'] = 'Vous êtes maintenant déconnecté';

header('location: index.php');
}


function isLogged ()
{
     if(isset($_SESSION['auth'])){
         return true;
     }
}

?>