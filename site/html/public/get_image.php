<?php

require 'vendor/autoload.php';

$img = filter_input(INPUT_GET, 'img', FILTER_SANITIZE_SPECIAL_CHARS);

if (isset($img)) {
    getConfig();
    $uploadDir = getenv('UPLOAD_DIR');
    $img = basename($img);

    header('Content-Type: image/jpeg');
    header('Content-Disposition: inline');
    header('Content-Length: ' . filesize("$uploadDir/$img"));
    readfile("$uploadDir/$img");
}
