<?php

function connectDB() {
    $db = pg_connect("host=localhost port=5432 dbname=appli_web user=appli_web password=appli_web");
    return $db;
}

function select($query) {
    $result = pg_query($query);
    $resultInArray = pg_fetch_all($result);
    return $resultInArray;
}

function insert($table, $values) {
    $valuesLength = count($values);
    $query = "INSERT INTO {$table} VALUES(";
    foreach($values as $key=>$value) {
        if (gettype($value) == "integer" or gettype($value) == "double" or gettype($value) == "boolean") {
            $query = $query . "{$value}";
        } else if (gettype($value) == "string") {
            $query = $query . "'{$value}'";
        }
        
        if ($key != $valuesLength-1) {
            $query = $query . ',';
        } else {
            $query = $query . ')';
        }
    }
    
    $rslt = pg_query($query);
    if (!$rslt) {
      echo "Une erreur s'est produite !";
    }
}

$db = connectDB();

function getModeleInfo($selectResult) {
    $id_couleur = intval($selectResult[0]['id_couleur']);
    $id_marque = intval($selectResult[0]['id_marque']);
    $id_categorie = intval($selectResult[0]['id_categorie']);
    $id_genre = intval($selectResult[0]['id_genre']);
    
    $couleur = select("SELECT * FROM couleur WHERE id_couleur = {$id_couleur}")[0]['libelle']; 
    $marque = select("SELECT * FROM marque WHERE id_marque = {$id_marque}")[0]['libelle']; 
    $categorie = select("SELECT * FROM categorie WHERE id_categorie = {$id_categorie}")[0]['libelle']; 
    $genre = select("SELECT * FROM genre WHERE id_genre = {$id_genre}")[0]['libelle'];

    return array($couleur, $marque, $genre, $categorie);
}

$result = select("SELECT MAX(id_couleur) FROM couleur");
var_dump($result);

?>


<!--Sélection des produits pour page acceuil, pour les filtres il faut juste ajouter la clause where-->
<?php $result = select("SELECT * FROM modele"); ?>
<?php foreach($result as $row): ?>
    <div>
        <img height=190 width=335 src="Base de donnée photos/<?= $row['nom_image']; ?>">
        <p><?= "{$row['nom']} => {$row['prix']}"; ?></p>
    </div>
<?php endforeach; ?>


<!--Page produit-->
<?php 
$result = select("SELECT * FROM modele WHERE id_modele = 2"); 
list($couleur, $marque, $genre, $categorie) = getModeleInfo($result);
?>
<?php foreach($result as $row): ?>
    <div>
        <img height=190 width=335 src="Base de donnée photos/<?= $row['nom_image']; ?>">
        <p><?= "{$row['nom']} => {$row['prix']}"; ?>
            <br>Couleur: <?= $couleur ?>
            <br>Marque: <?= $marque ?>
            <br>Genre: <?= $genre ?>
            <br>Catégorie: <?= $categorie ?>
            <button>Ajouter au panier</button>
        </p>
    </div>
<?php endforeach; ?>


<?php

?>