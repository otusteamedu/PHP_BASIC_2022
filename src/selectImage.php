<?php

function selectImage($id)
{
    $pdo = dbconn();
    $result = $pdo->prepare('SELECT path FROM images where id =:id');
    $result->execute(array(':id' => $id));
    $output = $result->fetchAll(PDO::FETCH_ASSOC);
    $image = $output['0']['path'];
    return $image;
}

function selectImageSml($id)
{
    $pdo = dbconn();
    $result = $pdo->prepare('SELECT path FROM images_sml where id =:id');
    $result->execute(array(':id' => $id));
    $output = $result->fetchAll(PDO::FETCH_ASSOC);
    $image = $output['0']['path'];
    return $image;
}
