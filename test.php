<?php

include("script/fonctionsBases.php");
$db = connectDB();
session_start();

if (isset($_SESSION)) {
    if (count($_SESSION) > 0) {
        echo "Bonjour " . $_SESSION['prenom'];    
    }
}
?>

<!-- Inscription -->
<form name="inscription" action="script/inscription.php" method="post">
    <div>
        <label for="nom">Nom: </label>
        <input type="text" id="nom" name="nom" />
    </div>
    <div>
        <label for="prenom">Prenom: </label>
        <input type="text" id="prenom" name="prenom" />
    </div>
    <div>
        <label for="email">Email: </label>
        <input type="text" id="email" name="email" />
    </div>
    <div>
        <label for="password">Mot de passe: </label>
        <input type="text" id="password" name="password" />
    </div>
    <div class="button">
        <button type="submit">INSCRIPTION</button>
    </div>
</form>

<!-- Connexion -->
<form name="connexion" action="script/connexion.php" method="post">
    <div>
        <label for="email">Email: </label>
        <input type="text" id="email" name="email" />
    </div>
    <div>
        <label for="password">Mot de passe: </label>
        <input type="text" id="password" name="password" />
    </div>
    <div class="button">
        <button type="submit">CONNEXION</button>
    </div>
</form>

<!-- Déconnexion -->
<a href="script/deconnexion.php">Déconnexion</a>



<!--Sélection des produits pour page acceuil, pour les filtres il faut juste ajouter la clause where-->
<?php $result = select("SELECT * FROM modele"); ?>
<?php foreach($result as $row): ?>
    <a href="article.php?id=<?= $row['id_modele'] ?>">
        <div>
            <img height=190 width=335 src="img/article/<?= $row['nom_image']; ?>">
            <p> <?= $row['nom'] ;?><br>
                <?= $row['prix'];?></p>
        </div>
    </a>
<?php endforeach; ?>