<?php
    require 'src/hours_rus.php';
    require 'src/minutes_rus.php';

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
                <?php
                    $imagesUploadFiles = scandir('images/upload');
                    $imageFiles = array_filter($imagesUploadFiles, fn ($file) => boolval(preg_match('/\.(jpg|png|gif)$/', $file)));

                    foreach ($imageFiles as $image) {
                ?>
                    <figure class="col-sm-12 col-md-6 col-lg-4">
                        <a href="<?="images/upload/$image"?>" target="_blank">
                            <img class="thumb" src="<?="images/upload/$image"?>" alt="<?=$image;?>">
                        </a>
                        <figcaption><?=$image;?></figcaption>
                    </figure>
                <?php
                    }
                ?>
            </div>
        </div>
    </main>

    <footer>
       <?php include 'foot.php'; ?>
    </footer>
</body>

</html>
