<?php

include("fonctionsBases.php");
$db = connectDB();
session_start();

if (isset($_GET['id'])) {
    if (isset($_SESSION)) {
        if (!count($_SESSION) > 0) {
            echo "Pas d'utilisateur, veuillez créer un compte";
            return 0;
        }
    }
    
    // On supprime l'article du panier
    $query = "DELETE FROM panier WHERE id_user = {$_SESSION['id_user']} AND id_article = {$_GET['id']}";
    $result = pg_query($query);
    
    // Puis on remets l'article en stock
    $qte = intval(select("SELECT quantite FROM article WHERE id_article = {$_GET['id']}")[0]['quantite'])+1;
    $query = "UPDATE article SET quantite = {$qte} WHERE id_article = {$_GET['id']}";
    $result = pg_query($query);

    header('Location: ../index.php');
    exit();
} else {
    echo "Erreur Panier";
    return 0;
}

?>