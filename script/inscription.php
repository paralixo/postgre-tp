<?php

include("fonctionsBases.php");
$db = connectDB();

$id = select("SELECT MAX(id_user) FROM utilisateur");
$id = intval($id[0]['max'])+1;

$nom = $_POST['nom'];
$prenom = $_POST['prenom'];
$email = $_POST['email'];
$password = $_POST['password'];

$alreadyUse = select("SELECT * FROM utilisateur WHERE email = '{$email}'");
if (!$alreadyUse) {
    insert ("utilisateur", array($id, $nom, $prenom, $email, $password), array("id_user", "nom", "prenom", "email", "mot_de_passe"));

    header('Location: ../index.php');
    exit();
} else {
    echo "Adresse email déjà utilisé";
}

?>