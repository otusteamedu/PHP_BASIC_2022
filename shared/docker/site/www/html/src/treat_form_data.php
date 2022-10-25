<?php

require_once 'resize_image.php';

function treat_form_data(): string
{
    $ret = '';
    $phpFileUploadErrors = [
        1 => 'The uploaded file exceeds the upload_max_filesize directive in php.ini',
        2 => 'The uploaded file exceeds the MAX_FILE_SIZE directive that was specified in the HTML form',
        3 => 'The uploaded file was only partially uploaded',
        4 => 'No file was uploaded',
        6 => 'Missing a temporary folder',
        7 => 'Failed to write file to disk.',
        8 => 'A PHP extension stopped the file upload.',
    ];

    if (!isset($_FILES['upload'])) {
        return $ret;
    }

    try {
        $uploadErrorCode = $_FILES['upload']['error'];
        if ($uploadErrorCode) {
            throw new ErrorException($phpFileUploadErrors[$uploadErrorCode], $uploadErrorCode);
        }

        if ($_FILES['upload']['type'] !== 'image/jpeg') {
            throw new ErrorException('Недопустимый формат изображения', 9);
        }

        if (empty($_FILES['upload']['size'])) {
            throw new ErrorException('Пустой файл', 10);
        }

        $uploadedFileName = basename($_FILES['upload']['name']);
        $uploadDir = '/var/www/html/images/upload';
        $pathToSavedFile = "$uploadDir/$uploadedFileName";
        if (!@move_uploaded_file($_FILES['upload']['tmp_name'], $pathToSavedFile)) {
            throw new ErrorException('Ошибка перемещения файла', 11);
        }

        $resizedGDImage = resize_image($pathToSavedFile, 300, 280);
        $thumbDir = "$uploadDir/thumbs";
        $thumbFileName = "thumb_$uploadedFileName.png";
        $pathToThumbFile = "$thumbDir/$thumbFileName";
        if(!@imagepng($resizedGDImage, $pathToThumbFile, 5)) {
            throw new ErrorException('Ошибка создания миниатюры', 12);
        }
        imagedestroy($resizedGDImage);
    } catch (ErrorException $e) {
        $ret = $e->getMessage();
    }

    return $ret;
}
