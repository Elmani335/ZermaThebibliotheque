<?php
//Envoyer les donné du form sur la bdd une fois le bouton appuyer//
include_once '../assets/includes/config.php';

//envoyer le form avec les donné booktitle bookauthor et bookdescription sur la bdd//


if(isset($_POST['submit'])){
    $booktitle = $_POST['booktitle'];
    $bookauthor = $_POST['bookauthor'];
    $bookdescription = $_POST['bookdescription'];
    $sql = "INSERT INTO books (booktitle, bookauthor, bookdescription) VALUES ('$booktitle', '$bookauthor', '$bookdescription')";

    $result = mysqli_query($conn, $sql);
    if($result){
    }else{
        echo 'Data not inserted';
    }
}

//Boutton suppression du livre de la bdd//
if(isset($_POST['submitid'])) {
    $bookid = $_POST['bookid'];
    $sql = "DELETE FROM books WHERE bookid = '$bookid'";
    $result = mysqli_query($conn, $sql);
    if($result){
    }else{
        echo 'Data not deleted';
    }
}

?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>BOOKS</title>
    <link rel="stylesheet" href="../assets/css/booktools.css">
</head>
<body>
<main class="container">
    <div class="row">
        <section class="col-12">
            <?php include_once '../assets/includes/navbar.php'; ?>
            <!-- Formulaire d'ajout de livre -->
                <form action="add.php" method="post">
                <div class="form-group-title">
                    <label for="booktitle">TITLE</label>
                    <input type="text" name="booktitle" id="booktitle" class="form-control">
                </div>
                <div class="form-group-author">
                    <label for="bookauthor">AUTHOR</label>
                    <input type="text" name="bookauthor" id="bookauthor" class="form-control">
                </div>
                <div class="form-group-description">
                    <label for="bookdescription">DESCRIPTION</label>
                    <textarea name="bookdescription" id="bookdescription" class="form-control"></textarea>
                </div>

                    <button type="submit" name="submit" class="btn-primary">ADD</button>
            </form>
        </section>
    </div>
</main>
<link rel="stylesheet" href="../assets/css/index.css">

    <div class="row">
        <section class="col-12">
            <?php include_once '../assets/includes/navbar.php';
            include 'dbreq2.php';
            ?>

            <table class="table">
                <thead>
                <th>DELETE</th>
                <th>TITLE</th>
                <th>AUTHOR</th>
                </thead>
                <tbody>
                <?php
                foreach($books as $book){
                    ?>
                    <tr>

                        <td> <!-- boutton qui permet de supprimer le livre de la bdd -->
                            <form action="add.php" method="post">
                                <input type="hidden" name="bookid" value="<?php echo $book['bookid']; ?>">
                                <button type="submit" name="submitid" class="btn-primary">DELETE</button>
                            </form>
                        </td>
                        <td><?= $book['booktitle'] ?></td>
                        <td><?= $book['bookauthor'] ?></td>

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
                        <a href="add.php?page=<?= $currentPage - 1 ?>" class="page-link">PREVIOUS</a>
                    </li>
                    <?php for($page = 1; $page <= $pages; $page++): ?>
                        <!-- Lien vers chacune des pages -->
                        <li class="page-item <?= ($currentPage == $page) ? "active" : "" ?>">
                            <a href="add.php?page=<?= $page ?>" class="page-link"><?= $page ?></a>
                        </li>
                    <?php endfor ?>
                    <!-- Lien vers la page suivante sauf si on est sur last page -->
                    <li class="page-item <?= ($currentPage == $pages) ? "disabled" : "" ?>">
                        <a href="add.php?page=<?= $currentPage + 1 ?>" class="page-link">NEXT</a>


                    </li>
                </ul>
            </nav>
        </section>
    </div>

<form action="add.php" method="post">
    <div class="form-group-id">
        <label for="bookid">ID</label>
        <input type="text" name="bookid" id="bookid" class="form-control">
    </div>
    <button type="submit" name="submitid" class="btn-primary">DELETE</button>
</body>
</html>

