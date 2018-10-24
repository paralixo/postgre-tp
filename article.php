<?php

include("script/fonctionsBases.php");
$db = connectDB();

$idModele = $_GET["id"];
$result = select("SELECT * FROM modele WHERE id_modele = {$idModele}"); 
list($couleur, $marque, $genre, $categorie) = getModeleInfo($result);
?>

<?php foreach($result as $row): ?>
    <div>
        <img height=190 width=335 src="img/article/<?= $row['nom_image']; ?>">
        <p><?= "{$row['nom']} => {$row['prix']}"; ?>
            <br>Couleur: <?= $couleur ?>
            <br>Marque: <?= $marque ?>
            <br>Genre: <?= $genre ?>
            <br>Catégorie: <?= $categorie ?>
        </p>
        <form method="POST" action="bidon" >
            <input type="button" name="Submit" value="Ajouter au panier" class="exclusive" />
        </form> 
    </div>
<?php endforeach; ?>

