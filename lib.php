<?php

$pictureDir = 'gallery/';
$pictureDirMin = 'gallery/min/';

function iWantToBeLogged(string $picture)
{
    $logFile = 'logLoadPictures.txt';
    $result = 'Добавили в галлерею фото '.$picture.', дата и время загрузки: '. date('Y-m-d H:i:s').PHP_EOL;
    file_put_contents($logFile, $result, FILE_APPEND);
}

function addedImages(array $pictureFile, string $pictureDir, string $pictureDirMin){
    if(isset($pictureFile['picture']) && $pictureFile['picture']['size'] > 0){

        $allowedExtensions = ['jpg','jpeg','png','gif'];
        $ext = pathinfo($pictureFile['picture']['name'], PATHINFO_EXTENSION);
        if(in_array($ext, $allowedExtensions))
        {
            $uniq_name = uniqid().$pictureFile['picture']['name'];
            if(move_uploaded_file($pictureFile['picture']['tmp_name'],$pictureDir.$uniq_name))
            {
                iWantToBeLogged($uniq_name);
                copy('gallery/'.$uniq_name, $pictureDirMin.$uniq_name);
                unset($uniq_name);
            }

        }
        return $pictures = scandir($pictureDirMin);
    }
}
