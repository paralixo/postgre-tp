<?php

function connectDB() {
    $db = pg_connect("host=localhost port=5432 dbname=appli_web user=appli_web password=appli_web");
    return $db;
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

$db = connectDB();

insert ("table", array());

insert ("modele", array(1,"Nike Air Max 1 Blanche",129.00,"abc","NikeAirMax1Blanche.jpg",1,1,1,1));
insert ("modele", array(2,"Nike Air Max 1 Bleue",129.00,"abc","NikeAirMax1Bleue.jpg",6,1,1,1));
insert ("modele", array(3,"Nike Air Max 1 Grise",129.00,"abc","NikeAirMax1Grise.jpg",8,1,1,1));
insert ("modele", array(4,"Adidas Stan Smith Blanche",129.00,"abc","AdidasStanSmithBlanche.jpg",1,1,2,1));
insert ("modele", array(5,"Adidas Stan Smith Verte",129.00,"abc","AdidasStanSmithVerte.jpg",5,1,2,1));
insert ("modele", array(6,"Bottes Uggs",129.00,"abc","BottesUggs.jpg",7,2,4,3));
insert ("modele", array(7,"Nike Air Force 1 Low Blanche",129.00,"abc","NikeAirForce1LowBlanche.jpg",1,1,1,1));
insert ("modele", array(8,"Dr. Martens Basse Noire",129.00,"abc","DrMartensBasseNoire.jpg",9,3,5,2));

insert ("couleur", array(1,"Blanc"));
insert ("couleur", array(2,"Jaune"));
insert ("couleur", array(3,"Orange"));
insert ("couleur", array(4,"Rouge"));
insert ("couleur", array(5,"Vert"));
insert ("couleur", array(6,"Bleu"));
insert ("couleur", array(7,"Marron"));
insert ("couleur", array(8,"Gris"));
insert ("couleur", array(9,"Noir"));

insert ("categorie", array(1,"Sneakers"));
insert ("categorie", array(2,"Bottes"));
insert ("categorie", array(3,"Chaussures de ville"));
insert ("categorie", array(4,"Tongs"));
insert ("categorie", array(5,"Trainers"));

insert ("marque", array(1,"Nike"));
insert ("marque", array(2,"Adidas"));
insert ("marque", array(3,"New Balance"));
insert ("marque", array(4,"Uggs"));
insert ("marque", array(5,"Dr. Martens"));
?>