<?php

function connectDB() {
    $db = pg_connect("host=localhost port=5432 dbname=appli_web user=appli_web password=appli_web");
    return $db;
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

insert ("modele", array(1,"Nike Air Max 1 Blanche",129.00,"abc","NikeAirMax1Blanche.jpg",1,1,1,1));
insert ("modele", array(2,"Nike Air Max 1 Bleue",129.00,"abc","NikeAirMax1Bleue.jpg",1,1,1,6));
insert ("modele", array(3,"Nike Air Max 1 Grise",110.00,"abc","NikeAirMax1Grise.jpg",1,1,1,8));
insert ("modele", array(4,"Adidas Stan Smith Blanche",89.99,"abc","AdidasStanSmithBlanche.jpg",1,2,1,1));
insert ("modele", array(5,"Adidas Stan Smith Verte",89.99,"abc","AdidasStanSmithVerte.jpg",1,2,1,5));
insert ("modele", array(6,"Bottes Uggs",130.00,"abc","BottesUggs.jpg",3,4,2,7));
insert ("modele", array(7,"Nike Air Force 1 Low Blanche",100.00,"abc","NikeAirForce1LowBlanche.jpg",1,1,1,1));
insert ("modele", array(8,"Dr. Martens Basse Noire",159.00,"abc","DrMartensBasseNoire.jpg",2,5,3,9));

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

insert ("genre", array(1,"Mixte"));
insert ("genre", array(2,"Homme"));
insert ("genre", array(3,"Femme"));

insert ("article", array(1,36,3,1));
insert ("article", array(2,37,3,1));
insert ("article", array(3,38,3,1));
insert ("article", array(4,39,3,1));
insert ("article", array(5,40,3,1));
insert ("article", array(6,41,3,1));
insert ("article", array(7,42,3,1));
insert ("article", array(8,43,3,1));
insert ("article", array(9,44,3,1));
insert ("article", array(10,45,3,1));
insert ("article", array(11,36,3,2));
insert ("article", array(12,37,3,2));
insert ("article", array(13,38,3,2));
insert ("article", array(14,39,3,2));
insert ("article", array(15,40,3,2));
insert ("article", array(16,41,3,2));
insert ("article", array(17,42,3,2));
insert ("article", array(18,43,3,2));
insert ("article", array(19,44,3,2));
insert ("article", array(20,45,3,2));
insert ("article", array(21,36,3,3));
insert ("article", array(22,37,3,3));
insert ("article", array(23,38,3,3));
insert ("article", array(24,39,3,3));
insert ("article", array(25,40,3,3));
insert ("article", array(26,41,3,3));
insert ("article", array(27,42,3,3));
insert ("article", array(28,43,3,3));
insert ("article", array(29,44,3,3));
insert ("article", array(30,45,3,3));
insert ("article", array(31,36,3,4));
insert ("article", array(32,37,3,4));
insert ("article", array(33,38,3,4));
insert ("article", array(34,39,3,4));
insert ("article", array(35,40,3,4));
insert ("article", array(36,41,3,4));
insert ("article", array(37,42,3,4));
insert ("article", array(38,43,3,4));
insert ("article", array(39,44,3,4));
insert ("article", array(40,45,3,4));
insert ("article", array(41,36,3,5));
insert ("article", array(42,37,3,5));
insert ("article", array(43,38,3,5));
insert ("article", array(44,39,3,5));
insert ("article", array(45,40,3,5));
insert ("article", array(46,41,3,5));
insert ("article", array(47,42,3,5));
insert ("article", array(48,43,3,5));
insert ("article", array(49,44,3,5));
insert ("article", array(50,45,3,5));
insert ("article", array(51,36,3,6));
insert ("article", array(52,37,3,6));
insert ("article", array(53,38,3,6));
insert ("article", array(54,39,3,6));
insert ("article", array(55,40,3,6));
insert ("article", array(56,41,3,6));
insert ("article", array(57,42,3,6));
insert ("article", array(58,43,0,6));
insert ("article", array(59,44,0,6));
insert ("article", array(60,45,0,6));
insert ("article", array(61,36,3,7));
insert ("article", array(62,37,3,7));
insert ("article", array(63,38,3,7));
insert ("article", array(64,39,3,7));
insert ("article", array(65,40,3,7));
insert ("article", array(66,41,3,7));
insert ("article", array(67,42,3,7));
insert ("article", array(68,43,3,7));
insert ("article", array(69,44,3,7));
insert ("article", array(70,45,3,7));
insert ("article", array(71,36,0,8));
insert ("article", array(72,37,0,8));
insert ("article", array(73,38,0,8));
insert ("article", array(74,39,3,8));
insert ("article", array(75,40,3,8));
insert ("article", array(76,41,3,8));
insert ("article", array(77,42,3,8));
insert ("article", array(78,43,3,8));
insert ("article", array(79,44,3,8));
insert ("article", array(80,45,3,8));

insert ("civilite", array(1,"Monsieur"));
insert ("civilite", array(2,"Madame"));

insert ("utilisateur", array(1,"Sombrun","Joé",40250,"Mugron","France","joe.sombrun@ynov.com","0685286648","TRUE","azerty",1,"9 rue Frédéric Bastiat"));
insert ("utilisateur", array(2,"Ynov","Bordeaux",33000,"Bordeaux","France","Ynov.Bordeaux@ynov.com","0800600633","FALSE","azertyui",2,"89 Quais des Chartons"));

?>