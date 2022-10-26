<?php

/**
 * Отобразить галерею на основе html-шаблона
 */
function display_gallery(): void
{
    $imageContainerTemplate = file_get_contents('../templates/image_container.html');
    $thumbDirContent = scandir('../public/images/upload/thumbs');
    $thumbFileNames = array_filter($thumbDirContent, fn ($file) => boolval(preg_match('/^thumb_.*\.png$/', $file)));
    
    foreach ($thumbFileNames as $thumbFileName) {
        // исходное название файла изображения
        $imageFileName = mb_substr($thumbFileName, 6, -4);
        $pathToImageFile = "/images/upload/$imageFileName";
        $pathToThumbFile = "/images/upload/thumbs/$thumbFileName";
        $imageContainer = str_replace(
            [
                '{{pathToImageFile}}',
                '{{pathToThumbFile}}',
                '{{imageFileName}}',
                '{{thumbFileName}}',
            ],
            [
                $pathToImageFile,
                $pathToThumbFile,
                $imageFileName,
                $thumbFileName,
            ],
            $imageContainerTemplate
        );

        echo $imageContainer;
    }
}
