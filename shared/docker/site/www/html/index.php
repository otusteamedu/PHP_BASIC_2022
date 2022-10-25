<?php
    $title = 'Фотогалерея';
    require 'head.php';
?>

<body>
    <header>
        <h1>Фотогалерея</h1>
    </header>

    <main>
        <div class="container-fluid">
            <div class="row">
                <!-- Обработать форму и сохранить файлы изображения -->
                <?php
                    var_dump($_FILES);
                ?>

                <!-- Отобразить галерею -->
                <?php
                    $imagesUploadFiles = scandir('images/upload/thumbs');
                    $imageFiles = array_filter($imagesUploadFiles, fn ($file) => boolval(preg_match('/\.(jpg|png|gif)$/', $file)));

                    foreach ($imageFiles as $image) {
                        $safeImageFileName = htmlspecialchars($image);
                ?>
                    <figure class="col-sm-12 col-md-6 col-lg-4">
                        <a href="<?="images/upload/$safeImageFileName"?>" target="_blank">
                            <img class="thumb" src="<?="images/upload/$safeImageFileName"?>" alt="<?=$safeImageFileName;?>">
                        </a>
                        <figcaption><?=$safeImageFileName;?></figcaption>
                    </figure>
                <?php
                    }
                ?>
            </div>

            <!-- Форма загрузки картинки -->
            <div class="d-flex justify-content-center">
                <form method="post" enctype="multipart/form-data">
                    <div class="form-group pt-4">
                        <input type="hidden" name="MAX_FILE_SIZE" value="6000000">
                        <input class="form-control-file" type="file" name="upload" id="uploadImageFormControl">
                    </div>
                    <div class="form-group">
                        <input class="form-control" type="submit" name="submit_upload" id="submitUpload">
                    </div>
                </form>
            </div>
        </div>
    </main>

    <footer>
       <?php include 'foot.php'; ?>
    </footer>
</body>

</html>
