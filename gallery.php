<?php
require_once 'db.php';

function gallery($id)
{
    $pdo = connect();
    $result = $pdo->query(
        "SELECT image FROM images WHERE book_id = $id"
    );
    $result->execute();
    $data = $result->fetchAll();

    $files = [];

    for ($i = 0; $i < sizeof($data); $i++) {
        foreach ($data[$i] as $value) {
            array_push($files, $value);
        }
    }
    foreach ($files as $value) {

        echo '<a href="' . '../images/' . $value . '" target = "_blank"><img src="' . '../mini/' . $value . '"></a>';
    }
}