<?php
function queryBook($id)
{
    $pdo = dbconn();
    $result = $pdo->prepare('SELECT name FROM books where id_book =:id');
    $result->execute(array(':id' => $id));
    $output = $result->fetchAll(PDO::FETCH_ASSOC);
    $data = $output['0']['name'];
    return $data;
}
