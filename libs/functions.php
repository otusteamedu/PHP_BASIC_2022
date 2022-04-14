<?php

require_once('db.php');

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

function getImages():array {
    return array_diff(scandir("img/min"), array('..', '.'));
}

function resizeImage() {
    $allowedExtensions = ['jpg','jpeg','png'];
    $ext = pathinfo($_FILES['picture']['name'], PATHINFO_EXTENSION);
    if(in_array($ext, $allowedExtensions))
    {
        $uniq_name = uniqid().$_FILES['picture']['name'];
        $fullPathImg = 'img/' . $uniq_name;
        $fullPathMinImg = 'img/min/' . $uniq_name;
        if(!move_uploaded_file($_FILES['picture']['tmp_name'], $fullPathImg))
        {
            unset($uniq_name);
        }
        SetImgSize($fullPathImg, 280, 160, 1, $fullPathMinImg);
        header('Location: /');
    }
}

function setUserInSession($userData) {
    $_SESSION['is_auth'] = true;
    $_SESSION['user_id'] = $userData['id'];
    $_SESSION['username'] = $userData['name'];
}

function login($username, $password) {
    $result = authenticate($username, $password);
    if($result !== false)
    {
        setUserInSession($result) ;
    }
    header('Location: /');
}

function router($getParams = null, $postParams = null, $fileParams = null) {
    if(isset($fileParams['picture']) && $fileParams['picture']['size'] > 0) resizeImage();
    if(!empty($getParams['action']) && $getParams['action'] === 'login') login($postParams['username'], $postParams['password']);
    if(!empty($getParams['action']) && $getParams['action'] === 'registry') {
        register($postParams['username'], $postParams['password']);
        login($postParams['username'], $postParams['password']);
    }
    if(!empty($getParams['action']) && $getParams['action'] === 'logout')
    {
        session_destroy();
        header('Location: /');
    }
}