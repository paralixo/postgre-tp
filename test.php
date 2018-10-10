<?php

function connectDB() {
    $db = pg_connect("host=localhost port=5432 dbname=appli_web user=appli_web password=appli_web");
    return $db;
}

function select($query) {
    $result = pg_query($query);
    $resultInArray = pg_fetch_all($result);
    
    if (!$resultInArray) {
        return null;
    }
    
    return $resultInArray;
}

function insert($table, $values) {
    $valuesLength = count($values);
    $query = "INSERT INTO {$table} VALUES(";
    foreach($values as $key=>$value) {
        if (gettype($value) == "integer") {
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

echo "Test appel bdd: ";
$db = connectDB();
$result = select("SELECT * FROM test WHERE id = 3"); 

echo $result;

foreach($result as $row) {
    echo "<br>".$row['id']." ".$row['description'];
}

insert("test", array(2, "description bidon"));
//$res = pg_insert($db, 'test')
?>