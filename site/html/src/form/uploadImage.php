<?php

/**
 * Обработчик формы загрузки изображения.
 * Валидирует отправленные данные,
 * создаёт миниатюру загруженной картинки,
 * перемещает файлы загруженной картинки и её миниатюры в соответствующие директории.
 * 
 * @return string Сообщение об ошибке, если была.
 */
function uploadImage(): string
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

        getConfig();

        $uploadedFileName = basename($_FILES['upload']['name']);
        $uploadDir = getenv('UPLOAD_DIR');
        $pathToSavedFile = "$uploadDir/$uploadedFileName";
        if (!@move_uploaded_file($_FILES['upload']['tmp_name'], $pathToSavedFile)) {
            throw new ErrorException('Ошибка перемещения файла', 11);
        }

        $resizedGDImage = resizeImage($pathToSavedFile, 300, 280);
        $thumbDir = getenv('THUMBS_DIR');
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
