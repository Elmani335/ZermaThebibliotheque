<?php

// connexion à la bdd
$mysql_host = "localhost";
$mysql_user = "root";
$mysql_pass = "";
$mysql_dbase = "zerma";

$conn = mysqli_connect($mysql_host, $mysql_user, $mysql_pass, $mysql_dbase);
// select des books dans la bss zerma
$sql = "SELECT * FROM books";



?>

