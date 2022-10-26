<?php

function uploadPhotos()
{
    $photos = [];

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

            header("Location: public");

            die();

        } else {
            echo '<div class="warning">' . 'Upload an image in jpg/jpeg format, please' . '</div>';
        }
    }
}
uploadPhotos();
