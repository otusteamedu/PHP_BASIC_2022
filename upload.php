<?php

function uploadPhotos()
{
    $photos = [];
    $result = '';

    if (file_exists('photos.json')) {
        $photos = json_decode(file_get_contents('photos.json'), true);
    }

    if ($_FILES['file']['size'] > 0) {
        $mimetype = mime_content_type($_FILES['file']['tmp_name']);

        if (in_array($mimetype, array('image/jpeg', 'image/jpg'))) {

            $file = $_FILES['file'];

            $filename = 'public/img/' . uniqid() . '_' . $file['name'];
            if (move_uploaded_file($file['tmp_name'], $filename)) {
                $data['file'] = $filename;
            }

            $photos[] = $data;

            file_put_contents('photos.json', json_encode($photos));

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

$result = uploadPhotos();

header("Refresh:2; url=public");

echo ($result);
