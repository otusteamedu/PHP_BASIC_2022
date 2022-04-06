<?php 
    
    $pictureDir = 'gallery/';
    $pictureDirMin = 'gallery/min/';
    $pictures = scandir($pictureDirMin);

    function iWantToBeLogged($picture)
    {
        $logFile = 'logLoadPictures.txt';
        $result = 'Добавили в галлерею фото '.$picture.', дата и время загрузки: '. date('Y-m-d H:i:s').PHP_EOL;
        file_put_contents($logFile, $result, FILE_APPEND);
    }


    if(isset($_FILES['picture']) && $_FILES['picture']['size'] > 0){
       
       $allowedExtensions = ['jpg','jpeg','png','gif'];
            $ext = pathinfo($_FILES['picture']['name'], PATHINFO_EXTENSION);
            if(in_array($ext, $allowedExtensions))
            {
                $uniq_name = uniqid().$_FILES['picture']['name'];
                if(move_uploaded_file($_FILES['picture']['tmp_name'],'gallery/'.$uniq_name))
                {
                    iWantToBeLogged($uniq_name);
                    copy('gallery/'.$uniq_name, 'gallery/min/'.$uniq_name);
                    unset($uniq_name);
                }
                
            }
        $pictures = scandir($pictureDirMin);
        
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
                    foreach ($pictures as $picture) 
                    {
                        if ($picture !== '.' && $picture !== '..')
                        { 
                ?>
                            <div class="item">
                                <a href="<?php echo($pictureDir.$picture); ?>" target="_blank" >
                                    <img class="image-gallery" src="<?php echo($pictureDirMin.$picture); ?>" alt="<?php echo($picture); ?>"/>
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
    <div>
        <p style="text-align: center;">All rights reserved &copy; 2001 - <?php echo(date('Y'));?>
        </p>
    </div>
</body>
</html>