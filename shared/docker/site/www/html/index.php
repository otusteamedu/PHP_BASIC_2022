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
            
            <!-- Галерея -->
            <div class="row">
                <?php
                    $imagesUploadFiles = scandir('images/upload');
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
                <form>
                    <div class="form-group pt-4">
                        <input type="file" name="upload" id="uploadImageFormControl" disabled>
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
