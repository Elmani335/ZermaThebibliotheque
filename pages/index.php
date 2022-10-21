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
$parPage = 2;

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
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>BOOKS</title>

    <link rel="stylesheet" href="../assets/css/index.css">
</head>
<body>
<main class="container">
    <div class="row">
        <section class="col-12">
            <h1>BOOKS LIST</h1>
            <table class="table">
                <thead>
                <th>ID</th>
                <th>TITLE</th>
                <th>DESCRIPTION</th>
                </thead>
                <tbody>
                <?php
                foreach($books as $book){
                    ?>
                    <tr>
                        <td><?= $book['bookid'] ?></td>
                        <td><?= $book['booktitle'] ?></td>
                        <td><?= $book['bookdescription'] ?></td>
                    </tr>
                    <?php
                }
                ?>
                </tbody>
            </table>
            <nav>
                <ul class="pagination">
                    <!-- Lien vers la page précédente sauf si first page -->
                    <li class="page-item <?= ($currentPage == 1) ? "disabled" : "" ?>">
                        <a href="./?page=<?= $currentPage - 1 ?>" class="page-link">PREVIOUS</a>
                    </li>
                    <?php for($page = 1; $page <= $pages; $page++): ?>
                        <!-- Lien vers chacune des pages -->
                        <li class="page-item <?= ($currentPage == $page) ? "active" : "" ?>">
                            <a href="./?page=<?= $page ?>" class="page-link"><?= $page ?></a>
                        </li>
                    <?php endfor ?>
                    <!-- Lien vers la page suivante sauf si on est sur last page -->
                    <li class="page-item <?= ($currentPage == $pages) ? "disabled" : "" ?>">
                        <a href="./?page=<?= $currentPage + 1 ?>" class="page-link">NEXT</a>
                    </li>
                </ul>
            </nav>
        </section>
    </div>
</main>
</body>
</html>
