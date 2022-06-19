<?php
declare(strict_types=1);
require_once '../libs/db.php';

const MAX_HEIGHT = 300;

$config = getConfig()['gallery'];
$imgDirMin = $config['imgdirmin'];
$imgDir = $config['imgdir'];
$allowedTypes = ['image/gif', 'image/bmp', 'image/png', 'image/jpeg', 'image/jpg'];

function resizeAndSaveImage(string $filename):GdImage
{
    list($width, $height, $type) = getimagesize($filename);
    $newWidth = $width;
    $newHeight = $height;
    if($height > MAX_HEIGHT){
        $newWidth = (int)($width * (MAX_HEIGHT / $height));
        $newHeight = MAX_HEIGHT;
    }
    $GDImage = imagecreatetruecolor($newWidth, $newHeight);
    $source = match($type){
        IMAGETYPE_JPEG => imagecreatefromjpeg($filename),
        IMAGETYPE_GIF => imagecreatefromgif($filename),
        IMAGETYPE_PNG => imagecreatefrompng($filename),
        IMAGETYPE_BMP => imagecreatefrombmp($filename)
    };
    imagecopyresized($GDImage, $source, 0, 0, 0, 0, $newWidth, $newHeight, $width, $height);
    return $GDImage;
}

function addImage(string $bookId, array $userImageData):bool
{
    global $imgDir;
    global $imgDirMin;
    global $allowedTypes;
    $tmpFilePath = $userImageData['tmp_name'];
    $fileName = $userImageData['name'];
    $mimeType = mime_content_type($tmpFilePath);
    if (in_array($mimeType, $allowedTypes)){
        $uploadFile = $imgDir . basename($fileName);
        if (move_uploaded_file($tmpFilePath, $uploadFile)) {
            $GDImage = resizeAndSaveImage($uploadFile);
            imagejpeg($GDImage, "{$imgDirMin}{$fileName}");
            if(bindImageToBook($bookId, $fileName)) 
                return true;
        } 
    }
    return false;
}

function getBookImagesList(string $bookId): array
{
    return getImagesByBook($bookId);
}