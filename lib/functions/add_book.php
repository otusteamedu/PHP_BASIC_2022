<?php

require_once '../db/function_db.php';
require_once 'functions.php';


$bookId = addBook($_POST);


$images = addedImages($_FILES, '../../lib/img/gallery/');

if (!empty($images)) {
    foreach ($images as $name) {

        addPicture($bookId, $name);
    }
}

header('Location: /');