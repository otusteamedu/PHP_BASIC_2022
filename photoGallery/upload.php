<?php
include("function.php");
function upload_file()
{
    $upload_dir = 'img_big';
    $max_file_size = 5242880;
    $valid_extention = ['jpg', 'jpeg', 'png'];
    $file_extension = pathinfo($_FILES['file']['name'], PATHINFO_EXTENSION);
    if (in_array(strtolower($file_extension), $valid_extention)) {
        if ($_FILES['file']['size'] < $max_file_size) {
            $file_name = time() . $_FILES['file']['name'];
            $destination = $upload_dir . '/' . $file_name;
            $tmp_name = $_FILES['file']['tmp_name'];
            move_uploaded_file($tmp_name, $destination);
            $sml_pic = resize_image($destination, 800, 600);
            imagejpeg($sml_pic, 'img_small/' . $file_name);
        }
    }
}

if (!empty($_POST['load'])) {
    $file_name = $_FILES['file']['type'];
    print("MIME-тип файла: " . $file_name . "<br>");
    upload_file();
    echo '<br /><br />';
    echo '<a href="index.php">Вернуться на страницу галереи</a>';
}
