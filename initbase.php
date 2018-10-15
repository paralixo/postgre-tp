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

insert ("genre", array(1,"Mixte"));
insert ("genre", array(2,"Homme"));
insert ("genre", array(3,"Femme"));

insert ("article", array(1,1,36,3));
insert ("article", array(2,1,37,3));
insert ("article", array(3,1,38,3));
insert ("article", array(4,1,39,3));
insert ("article", array(5,1,40,3));
insert ("article", array(6,1,41,3));
insert ("article", array(7,1,42,3));
insert ("article", array(8,1,43,3));
insert ("article", array(9,1,44,3));
insert ("article", array(10,1,45,3));
insert ("article", array(11,2,36,3));
insert ("article", array(12,2,37,3));
insert ("article", array(13,2,38,3));
insert ("article", array(14,2,39,3));
insert ("article", array(15,2,40,3));
insert ("article", array(16,2,41,3));
insert ("article", array(17,2,42,3));
insert ("article", array(18,2,43,3));
insert ("article", array(19,2,44,3));
insert ("article", array(20,2,45,3));
insert ("article", array(21,3,36,3));
insert ("article", array(22,3,37,3));
insert ("article", array(23,3,38,3));
insert ("article", array(24,3,39,3));
insert ("article", array(25,3,40,3));
insert ("article", array(26,3,41,3));
insert ("article", array(27,3,42,3));
insert ("article", array(28,3,43,3));
insert ("article", array(29,3,44,3));
insert ("article", array(30,3,45,3));
insert ("article", array(31,4,36,3));
insert ("article", array(32,4,37,3));
insert ("article", array(33,4,38,3));
insert ("article", array(34,4,39,3));
insert ("article", array(35,4,40,3));
insert ("article", array(36,4,41,3));
insert ("article", array(37,4,42,3));
insert ("article", array(38,4,43,3));
insert ("article", array(39,4,44,3));
insert ("article", array(40,4,45,3));
insert ("article", array(41,5,36,3));
insert ("article", array(42,5,37,3));
insert ("article", array(43,5,38,3));
insert ("article", array(44,5,39,3));
insert ("article", array(45,5,40,3));
insert ("article", array(46,5,41,3));
insert ("article", array(47,5,42,3));
insert ("article", array(48,5,43,3));
insert ("article", array(49,5,44,3));
insert ("article", array(50,5,45,3));
insert ("article", array(51,6,36,3));
insert ("article", array(52,6,37,3));
insert ("article", array(53,6,38,3));
insert ("article", array(54,6,39,3));
insert ("article", array(55,6,40,3));
insert ("article", array(56,6,41,3));
insert ("article", array(57,6,42,3));
insert ("article", array(58,6,43,0));
insert ("article", array(59,6,44,0));
insert ("article", array(60,6,45,0));
insert ("article", array(61,7,36,3));
insert ("article", array(62,7,37,3));
insert ("article", array(63,7,38,3));
insert ("article", array(64,7,39,3));
insert ("article", array(65,7,40,3));
insert ("article", array(66,7,41,3));
insert ("article", array(67,7,42,3));
insert ("article", array(68,7,43,3));
insert ("article", array(69,7,44,3));
insert ("article", array(70,7,45,3));
insert ("article", array(71,8,36,0));
insert ("article", array(72,8,37,0));
insert ("article", array(73,8,38,0));
insert ("article", array(74,8,39,3));
insert ("article", array(75,8,40,3));
insert ("article", array(76,8,41,3));
insert ("article", array(77,8,42,3));
insert ("article", array(78,8,43,3));
insert ("article", array(79,8,44,3));
insert ("article", array(80,8,45,3));

insert ("civilite", array(1,"Monsieur"));
insert ("civilite", array(2,"Madame"));

insert ("utilisateur", array(1,"Sombrun","Joé","9 rue Frédéric Bastiat",40250,"Mugron","France","joe.sombrun@ynov.com",0685286648,True,"azerty",1));
insert ("utilisateur", array(2,"Ynov","Bordeaux","89 Quais des Chartons",33000,"Bordeaux","France","Ynov.Bordeaux@ynov.com",0800600633,False,"azertyui",2));

?>