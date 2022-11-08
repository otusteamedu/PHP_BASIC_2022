<?php

/**
 * Сформировать HTML-код галереи на основе html-шаблона
 */
function buildGallery(): string
{
    getConfig();
    $templatesDir = getenv('TEMPLATES_DIR');
    $uploadDir = getenv('UPLOAD_DIR');
    $thumbsDir = getenv('THUMBS_DIR');

    // путь к HTML-шаблону контейнерного элемента для отображения миниатюры
    $pathToImageContainerTemplate = "$templatesDir/image_container.html";
    
    // файлы миниатюр
    $thumbDirContent = scandir($thumbsDir);
    $thumbFileNames = array_filter($thumbDirContent, fn ($file) => boolval(preg_match('/^thumb_.*\.png$/', $file)));
    
    // для каждой миниатюры генерируем контейнерный элемент
    $figures = '';
    foreach ($thumbFileNames as $thumbFileName) {
        // исходное название файла изображения
        $imageFileName = mb_substr($thumbFileName, 6, -4);
        $pathToImageFile = '/get_image.php?img=' . urlencode($imageFileName);
        $pathToThumbFile = "/images/thumbs/$thumbFileName";

        $figures .= renderTemplate($pathToImageContainerTemplate, [
            'pathToImageFile' => $pathToImageFile,
            'pathToThumbFile' => $pathToThumbFile,
            'imageFileName' => $imageFileName,
            'thumbFileName' => $thumbFileName,
        ]);
    }

    return $figures;
}
