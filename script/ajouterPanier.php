<?php

    include("fonctionsBases.php");
    $db = connectDB();
    session_start();

    $pointure = $_GET["pointure"];
    $idModele = $_GET["idModele"];

    if (isset($_SESSION)) {
        if (!count($_SESSION) > 0) {
            echo "Pas d'utilisateur, veuillez créer un compte";
            return 0;
        }
    }

    $date = select("SELECT current_date")[0]["current_date"];

    $article = select("SELECT * FROM article WHERE id_modele = $idModele AND pointure = $pointure");
    if (count($article) > 1) {
        echo "Problème article";
        return 0;
    }
    $article = $article[0];

    if (intval($article["quantite"]) <= 0) {
        echo "Plus d'articles";
        return 0;
    }

    $newQuantite = intval($article["quantite"]) - 1;
    $idArticle = $article["id_article"];
    $query = "UPDATE article SET quantite = $newQuantite WHERE id_article = $idArticle";
    pg_query($query);
    
    $idUser = $_SESSION["id_user"];
    $id_panier = intval(select("SELECT MAX(id_panier) FROM panier")[0]["max"]) + 1;
    $query = "INSERT INTO panier VALUES ($id_panier, '$date', $idUser, $idArticle)";
    pg_query($query);

    header('Location: ../index.php');
    exit();

?>