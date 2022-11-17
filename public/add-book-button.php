<?php
require_once '../db.php';

function addBooksButton($user)
{
    $pdo = connect();
    $result = $pdo->prepare('SELECT is_admin FROM users WHERE username = ?');
    $result->execute([$user]);
    $data = $result->fetchAll();
    if ($data[0]['is_admin']) {
        echo '<div id="add-books">
      <a class="btn btn-warning" href="add-book-page.php" role="button">Add the books to the library</a>
    </div>';
    }
}