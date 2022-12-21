<?php
require 'conn/dbconn.php';
function addPhoto($path)
{
    $pdo = dbconn();
    $result = $pdo->prepare('INSERT INTO images (path) VAlUES (:path)');
    $result->bindParam(':path', $path);
    $result->execute();
}

function addPhotoSml($path)
{
    $pdo = dbconn();
    $result = $pdo->prepare('INSERT INTO images_sml (path) VAlUES (:path)');
    $result->bindParam(':path', $path);
    $result->execute();
}
