<?php
include '../db/selectImage.php';
$id = $_GET['id']; ?>
<img src="<?= '../' . selectImage($id) ?>" alt="Фото галереи">