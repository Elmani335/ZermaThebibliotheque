<?php
// On détermine sur quelle page on se trouve
if(isset($_GET['page']) && !empty($_GET['page'])){
    $currentPage = (int) strip_tags($_GET['page']);
}else{
    $currentPage = 1;
}
// On se connecte à là base de données
require_once('../assets/includes/connect.php');

// On détermine le nombre total de books
$sql = 'SELECT COUNT(*) AS nb_books FROM `books`;';

// On prépare la requête
$query = $db->prepare($sql);

// On exécute
$query->execute();

// On récupère le nombre de livres
$result = $query->fetch();

$nbBooks = (int) $result['nb_books'];

// On détermine le nombre de livre par page
$parPage = 5;

// On calcule le nombre de pages total
$pages = ceil($nbBooks / $parPage);


// Calcul du 1er book de la page
$premier = ($currentPage * $parPage) - $parPage;

$sql = 'SELECT * FROM `books` ORDER BY `bookid` DESC LIMIT :premier, :parpage;';

// On prépare la requête
$query = $db->prepare($sql);

$query->bindValue(':premier', $premier, PDO::PARAM_INT);
$query->bindValue(':parpage', $parPage, PDO::PARAM_INT);

// On exécute
$query->execute();

// On récupère les valeurs dans un tableau associatif
$books = $query->fetchAll(PDO::FETCH_ASSOC);

require_once('../assets/includes/disconnect.php');
?>