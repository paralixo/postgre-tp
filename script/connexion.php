<?php

include("fonctionsBases.php");
$db = connectDB();

$email = $_POST['email'];
$password = $_POST['password'];
$rslt = select("SELECT * FROM utilisateur WHERE email = '{$email}' AND mot_de_passe = '{$password}'");

if ($rslt != false) {
    if (count($rslt) == 1) {
        $rslt = $rslt[0];
    } else {
        echo "Erreur Connexion";
    }

    session_start();
    $_SESSION = $rslt;

    header('Location: ../index.php');
    exit();
} else {
    echo "Erreur Connexion (login ou mdp)";
}

?>