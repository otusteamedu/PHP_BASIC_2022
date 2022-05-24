<?php
include_once "log.php";

$gallery = 'gallery/';

if (isset($_FILES['picture']) && $_FILES['picture']['size'] > 0) {
    addedImages($_FILES, $gallery,);
}

$pictures = array_diff(scandir($gallery), ['.', '..']);
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
            if (!empty($pictures)) {
                foreach ($pictures as $picture) {
                    ?>
                    <div class="item">
                        <a href="<?php echo($gallery . $picture); ?>" target="_blank">
                            <img class="image-gallery" src="<?php echo($gallery . $picture); ?>"
                                  alt="<?php echo($picture); ?>" />
                        </a>
                    </div>
                    <?php
                }
            } else {
            ?>
                <h3>Галерея пока пуста</h3>
            <?php
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