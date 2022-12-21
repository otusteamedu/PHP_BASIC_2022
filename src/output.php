<?php
include 'functions.php';
include 'db/addPhoto.php';
function upload_file()
{
    $upload_dir = 'img_big';
    $max_file_size = 5242880;
    if (!isImage($_FILES['file']['tmp_name'])) {
        return false;
    }
    if ($_FILES['file']['size'] >= $max_file_size) {
        return false;
    }
    $file_name = time() . $_FILES['file']['name'];
    $destination = $upload_dir . '/' . $file_name;
    $tmp_name = $_FILES['file']['tmp_name'];
    move_uploaded_file($tmp_name, $destination);
    $sml_pic = resize_image($destination, 300, 500);
    addPhoto($destination);
    imagejpeg($sml_pic, 'img_small/' . $file_name);
    $destSml = 'img_small/' . $file_name;
    addPhotoSml($destSml);
}

if (!empty($_POST['load'])) {
    $file_type = mime_content_type(($_FILES['file']['tmp_name']));
    upload_file();
    echo ("MIME-тип файла: " . $file_type . "<br>");
    echo '<br /><br />';
    echo '<a href="template/templateAdmin.php">Вернуться на страницу галереи</a>';
}
