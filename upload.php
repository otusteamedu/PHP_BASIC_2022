<?php
require_once 'resize.php';

function uploadPhotos($size): array
{
    $images = [];

    foreach ($_FILES['image']['tmp_name'] as $value) {
        $mimetype = mime_content_type($value);
        if (!in_array($mimetype, array('image/jpeg', 'image/jpg'))) {
            $result = '<div style="margin-top:50px;font-size:22px;color:#f00;
text-align:center;">' . 'Upload an image in jpg/jpeg format, please' . '</div>';
            echo ($result);

            return $images;
        }
    }

    foreach ($_FILES as $value) {
        for ($i = 0; $i < $size; $i++) {
            $filename = uniqid() . '_' . $value['name'][$i];
            $fullimage = 'public/images/' . $filename;

            move_uploaded_file($value['tmp_name'][$i], $fullimage);

            $miniature = resizeImage($fullimage, 100, 100);
            imagejpeg($miniature, 'public/mini/' . $filename);

            array_push($images, $filename);
        }
    }
    return $images;
}