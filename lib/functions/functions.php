<?php

require_once('image_resizer.php');


function iWantToBeLogged(string $picture)
{
    $logFile = 'log/LogLoadImages.txt';
    $result = 'Добавили в галлерею фото ' . $picture . ', дата и время загрузки: ' . date('Y-m-d H:i:s') . PHP_EOL;
    file_put_contents($logFile, $result, FILE_APPEND);
}

function addedImages(array $pictures, string $gallery)
{
    $result = [];

    if (isset($pictures['pictures']) && count($pictures['pictures']['size']) > 0) {
        $allowedExtensions = ['jpg', 'jpeg', 'png', 'gif'];

        foreach ($pictures['pictures']['name'] as $key => $name) {
            $ext = pathinfo($name, PATHINFO_EXTENSION);

            if (!in_array($ext, $allowedExtensions)) {
                continue;
            }

            $uniq_name = uniqid() . $name;

            if ((move_uploaded_file($pictures['pictures']['tmp_name'][$key], $gallery . $uniq_name))) {
                SetImgSize('../../lib/img/gallery/' . $uniq_name, 350, 240, 1, '../../lib/img/galleryMin/' . $uniq_name);
                $result[$key] = $uniq_name;
                unset($uniq_name);
            }
        }
    }

    return $result;
}