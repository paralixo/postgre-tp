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

function insert($table, $values, $columns=array()) {
    $valuesLength = count($values);
    $query = "INSERT INTO {$table} ";

    if (count($columns) > 0) {
        $query = $query . "(";
        foreach($columns as $key=>$column) {
            $query = $query . $column;
                
            if ($key != count($columns)-1) {
                $query = $query . ', ';
            } else {
                $query = $query . ') ';
            }
        }
    }
    
    $query = $query . "VALUES (";
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
      echo "Une erreur s'est produite ! (INSERT)";
    }
}

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

?>