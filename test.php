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
<?php $result = select("SELECT * FROM article WHERE id_article = 2"); ?>
<?php foreach($result as $row): ?>
    <div>
        <img height=190 width=335 src="Base de donnée photos/<?= $row['nom_image']; ?>">
        <p><?= "{$row['nom']} => {$row['prix']}"; ?></p>
    </div>
<?php endforeach; ?>


<?php

?>