<?php
    $title = 'Фотогалерея';
    require 'head.php';
    require '../src/treat_form_data.php';
?>

<body>
    <header>
        <h1>
            <a href="/" class="ml-2 float-left"><img src="images/home.png"></a>
            Фотогалерея
        </h1>
    </header>

    <main>
        <div class="container-fluid">
            <div class="row">
                <?php
                    // Обработать форму и сохранить файлы изображения
                    $uploadResult = treat_form_data();

                    // Отобразить галерею
                    $thumbFiles = scandir('images/upload/thumbs');
                    $thumbFiles = array_filter($thumbFiles, fn ($file) => boolval(preg_match('/^thumb_.*\.png$/', $file)));

                    foreach ($thumbFiles as $thumb) {
                        // исходное название файла изображения
                        $imageFileName = mb_substr($thumb, 6, -4);
                ?>
                    <figure class="col-sm-12 col-md-6 col-lg-4">
                        <div>
                            <a href="<?="/images/upload/$imageFileName"?>" target="_blank">
                                <img class="thumb" src="<?="/images/upload/thumbs/$thumb"?>" alt="<?=$thumb;?>">
                            </a>
                            <figcaption><?=$imageFileName;?></figcaption>
                        </div>
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
                        <label for="uploadImageFormControl" class="text-danger"><?=$uploadResult;?></label>
                        <input class="form-control-file" type="file" name="upload" id="uploadImageFormControl">
                        <label for="uploadImageFormControl" class="font-italic text-info">
                            <small>jpg-файл не более 6 Мб</small>
                        </label>
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
