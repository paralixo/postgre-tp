<?php
echo "Hello world!";
$db = pg_connect("host=localhost port=5432 dbname=appli_web user=postgres password=floflo157");
$query = "SELECT * FROM test";
$result = pg_query($query); 

foreach(pg_fetch_all($result) as $row) {
    echo "<br>".$row['id'].$row['description'];
}

?>