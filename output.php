<?php
include 'functions.php';
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
    $sml_pic = resize_image($destination, 800, 600);
    imagejpeg($sml_pic, 'img_small/' . $file_name);
}

if (!empty($_POST['load'])) {
    $file_type = mime_content_type(($_FILES['file']['tmp_name']));
    upload_file();
    echo ("MIME-тип файла: " . $file_type . "<br>");
    echo '<br /><br />';
    echo '<a href="template/templateGuest.php">Вернуться на страницу галереи</a>';
}
