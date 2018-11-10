<?php

include("fonctionsBases.php");
$db = connectDB();
session_start();

if (isset($_SESSION)) {
    if (!count($_SESSION) > 0) {
        echo "Pas d'utilisateur, veuillez créer un compte";
        return 0;
    }
}

$query = "DELETE FROM panier WHERE id_user = {$_SESSION['id_user']}";
$result = pg_query($query);

header('Location: ../index.php');
exit();
?>