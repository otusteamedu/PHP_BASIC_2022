<?php

function SetImgSize($img, $width, $height, $AspectRatio, $minImg) {
    switch (strtolower(strrchr($img, '.'))) {
        case ".jpg":
            $srcImage = @ImageCreateFromJPEG($img);
            break;
        case ".jpeg":
            $srcImage = @ImageCreateFromJPEG($img);
            break;
        case ".gif":
            $srcImage = @ImageCreateFromGIF($img);
            break;
        case ".png":
            $srcImage = @ImageCreateFromPNG($img);
            break;
        default:
            return -1;
    }

    $srcWidth = ImageSX($srcImage);
    $srcHeight = ImageSY($srcImage);
    if (($width < $srcWidth) || ($height > $srcHeight)) {
        if ($AspectRatio) {
            $ratioWidth = $srcWidth / $width;
            $ratioHeight = $srcHeight / $height;
            if ($ratioWidth < $ratioHeight) {
                $destWidth = intval($srcWidth / $ratioHeight);
                $destHeight = $height;
            } else {
                $destWidth = $width;
                $destHeight = intval($srcHeight / $ratioWidth);
            }
        } else {
            $destHeight = $height;
            $destWidth = $width;
        }
        $resImage = ImageCreateTrueColor($destWidth, $destHeight);
        ImageCopyResampled($resImage, $srcImage, 0, 0, 0, 0, $destWidth, $destHeight, $srcWidth, $srcHeight);
        switch (strtolower(strrchr($minImg, '.'))) {
            case ".jpg":
                ImageJPEG($resImage, $minImg, 100); // 100 - максимальное качество
                break;
            case ".jpeg":
                ImageJPEG($resImage, $minImg, 100); // 100 - максимальное качество
                break;
            case ".gif":
                ImageGIF($resImage, $minImg);
                break;
            case ".png":
                ImagePNG($resImage, $minImg);
                break;
        }
        ImageDestroy($srcImage);
        ImageDestroy($resImage);
    }
};



function resizeImage($path, $tmpPath):string {
    $allowedExtensions = ['jpg','jpeg','png'];
    $ext = pathinfo($path, PATHINFO_EXTENSION);
    if(in_array($ext, $allowedExtensions))
    {
        $uniq_name = uniqid().$path;
        $fullPathImg = $_SERVER['DOCUMENT_ROOT'].DIRECTORY_SEPARATOR. 'img/' . $uniq_name;
        $fullPathMinImg = $_SERVER['DOCUMENT_ROOT'].DIRECTORY_SEPARATOR . 'img/min/' . $uniq_name;
        if(!move_uploaded_file($tmpPath, $fullPathImg))
        {
            unset($uniq_name);
        }
        SetImgSize($fullPathImg, 250, 250, 1, $fullPathMinImg);
    }
    return $uniq_name;
}

function translitStr(string $string) {
    $string = mb_strtolower($string);
    $transliterationArray = [
        'а' => 'a',
        'б' => 'b',
        'в' => 'v',
        'г' => 'g',
        'д' => 'd',
        'е' => 'e',
        'ё' => 'yo',
        'ж' => 'zh',
        'з' => 'z',
        'и' => 'i',
        'й' => 'yi',
        'к' => 'k',
        'л' => 'l',
        'м' => 'm',
        'н' => 'n',
        'о' => 'o',
        'п' => 'p',
        'р' => 'r',
        'с' => 's',
        'т' => 't',
        'у' => 'u',
        'ф' => 'f',
        'х' => 'h',
        'ц' => 'c',
        'ч' => 'ch',
        'ш' => 'sh',
        'щ' => 'sch',
        'ь' => '',
        'ы' => 'y',
        'ъ' => '',
        'э' => 'a',
        'ю' => 'yu',
        'я' => 'ya',
        ' ' => "-"
    ];
    $value = strtr($string, $transliterationArray);
    return $value;
}


