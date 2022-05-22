<?php
include_once "log.php";

$gallary = 'gallery/';
$gallaryMin = 'galleryMin/';

$pictures = scandir($gallaryMin);

if (isset($_FILES['picture']) && $_FILES['picture']['size'] > 0) {

    $pictures = addedImages($_FILES, $gallary, $gallaryMin);
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Manrope:wght@400;500;600;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="css/normalize.css">
    <link rel="stylesheet" href="css/main.css">
</head>
<body>
<div class="services">
    <div class="container">
        <div class="block-main-caption">
            <h1 class="main-caption">Фотогаллерея</h1>
        </div>

        <div class="flex-container">
            <?php
            if (isset($pictures)) {
                foreach ($pictures as $picture) {
                    if ($picture !== '.' && $picture !== '..') {
                        ?>
                        <div class="item">
                            <a href="<?php echo($gallary . $picture); ?>" target="_blank">
                                <img class="image-gallery" src="<?php echo($gallaryMin . $picture); ?>"
                                     alt="<?php echo($picture); ?>"/>
                            </a>
                        </div>
                        <?php
                    }
                }
            }

            ?>
            <div class="block-button">
                <form action="index.php" method="post" enctype="multipart/form-data">
                    <input type="file" id="idPicture" name="picture"/>
                    <input type="submit" value="Отправить!">
                </form>
            </div>

        </div>
    </div>
</body>
</html>