<?php

session_start();

require_once ($_SERVER['DOCUMENT_ROOT'] . DIRECTORY_SEPARATOR . "/libs/db.php");

function deleteBook($bookId) {
    if ($_SESSION['is_admin'] == "1") {
        $pdo = getConnection();
        $pdo->prepare("delete from books where id = ?")->execute([$bookId]);
    }
    header("Location: /");
}

deleteBook($_GET['book']);