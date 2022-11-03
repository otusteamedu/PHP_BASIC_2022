<?php
require_once 'resize.php';

session_start();

function uploadPhotos()
{
    if (empty($_SESSION['token'])) {
        header('Location: public/login.php');
    } else {

        $result = '';

        if ($_FILES['file']['size'] > 0) {
            $mimetype = mime_content_type($_FILES['file']['tmp_name']);

            if (in_array($mimetype, array('image/jpeg', 'image/jpg'))) {

                $file = $_FILES['file'];

                $filename = uniqid() . '_' . $file['name'];
                $fullimage = 'public/img/' . $filename;

                move_uploaded_file($file['tmp_name'], $fullimage);

                $miniature = resizeImage($fullimage, 100, 100);
                imagejpeg($miniature, 'public/mini/' . $filename);

                $result = '<div style="margin-top:50px;font-size:22px;
text-align:center;">' . 'Your image have been uploaded!' . '</div>';

            } else {

                $result = '<div style="margin-top:50px;font-size:22px;color:#f00;
text-align:center;">' . 'Upload an image in jpg/jpeg format, please' . '</div>';

            }

        } else {
            $result = '<div style="margin-top:50px;font-size:22px;color:#f00;
text-align:center;">' . 'Upload an image, please' . '</div>';
        }
        return $result;
    }
}

$result = uploadPhotos();

header("Refresh:2; url=public");

echo ($result);
