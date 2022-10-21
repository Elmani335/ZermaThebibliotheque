<?php
include 'dbreq.php';

?>
<!DOCTYPE html>
<header lang="fr">
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
                <?php include_once '../assets/includes/navbar.php'; ?>
                <table class="table">
                    <thead>
                    <th>TITLE</th>
                    <th>AUTHOR</th>
                    <th>DESCRIPTION</th>
                    </thead>
                    <tbody>
                    <?php
                    foreach($books as $book){
                        ?>
                        <tr>
                            <td><?= $book['booktitle'] ?></td>
                            <td><?= $book['bookauthor'] ?></td>
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
                            <a href="books.php?page=<?= $currentPage - 1 ?>" class="page-link">PREVIOUS</a>
                        </li>
                        <?php for($page = 1; $page <= $pages; $page++): ?>
                            <!-- Lien vers chacune des pages -->
                            <li class="page-item <?= ($currentPage == $page) ? "active" : "" ?>">
                                <a href="books.php?page=<?= $page ?>" class="page-link"><?= $page ?></a>
                            </li>
                        <?php endfor ?>
                        <!-- Lien vers la page suivante sauf si on est sur last page -->
                        <li class="page-item <?= ($currentPage == $pages) ? "disabled" : "" ?>">
                            <a href="books.php?page=<?= $currentPage + 1 ?>" class="page-link">NEXT</a>


                        </li>
                    </ul>
                </nav>
            </section>
        </div>
    </main>
    </body>
    </html>
