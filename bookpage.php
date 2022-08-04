<?php
require_once 'lib/db/function_db.php';

$books = getBookById($_GET['id']);

?>
<head>
<link href="css/lightbox.css" rel="stylesheet" />
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css"
      integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
<link rel="stylesheet" href="css/normalize.css">
<link rel="stylesheet" href="css/main.css">
</head>
<body>
<div class="container">
    <div class="row gy-3">
        <div>
            <a href="/" class="previous">Вернуться к списку</a><br/><br/>
        </div>
        <div class="col-md-12 mt-4">
            <h1 class="text-center" align="center">Иллюстрации книги</h1><br/><br/>
        </div>
        <div>
            <h3 align="center">Данные о книге<?= ' ' . $books['bookname'] ?></h3>
        </div>
        <table class="table" border="1" bgcolor="#ffffff" align="center">
            <thead align="center">
            <tr>
                <th>ID</th>
                <th>Название книги</th>
                <th>Автор</th>
                <th>Количество страниц</th>
                <th>Год выпуска</th>
            </tr>
            </thead>
            <tbody align="center">
            <tr>
                <td><?= $books['id'] ?></td>
                <td><?= $books['bookname'] ?></td>
                <td><?= $books['author'] ?></td>
                <td><?= $books['page_count'] ?></td>
                <td><?= $books['year_of_issue'] ?></td>
            </tr>
            </tbody>
        </table>


        <?php $pictures = getPictureById($_GET['id']); ?>
        <?php if (!empty($pictures)): ?>
            <div class="d-flex flex-wrap justify-content-center">
                <?php foreach ($pictures as $picture): ?>
                    <div>
                        <a href="lib/img/gallery/<?= $picture['link'] ?>" data-lightbox="book" class="col-sm-4">
                            <img src="lib/img/galleryMin/<?= $picture['link'] ?>" alt="<?= $picture['link'] ?>">
                        </a>
                    </div>
                <?php endforeach; ?>
            </div>
        <?php endif; ?>

    </div>
</div>


<script src="js/lightbox-plus-jquery.js"></script>
</body>