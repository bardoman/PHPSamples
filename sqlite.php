

<?php
//$name=$_POST["name"];

//echo "mypost= $name";


echo "<br>";

$db = new SQLite3('test.db');

$res = $db->query('SELECT * FROM cars');

while ($row = $res->fetchArray()) {
    echo "{$row['id']} {$row['name']} {$row['price']} \n";
}

?>

