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
        <?php
            $imagesUploadFiles = scandir('images/upload');
            $imageFiles = array_filter($imagesUploadFiles, fn ($file) => boolval(preg_match('/\.(jpg|png|gif)$/', $file)));
        ?>

        <!-- <div id="tiles"> -->
        <div class="row">
            <?php
                foreach ($imageFiles as $image) {
            ?>
                <figure class="col-sm-12 col-md-6 col-lg-4">
                    <a href="<?="images/upload/$image"?>" target="_blank">
                        <img class="thumb" src="<?="images/upload/$image"?>" alt="<?=$image;?>">
                    </a>
                    <figcaption><?=$image;?></figcaption>
                    <!-- <a href="#" class="expand" id="expand_1">Expand <img src="images/arrow_r_purple.svg" alt="Развёрнутое описание"></a> -->
                </figure>
            <?php
                }
            ?>
        </div>
    </main>

    <footer>
       <?php include 'foot.php'; ?>
    </footer>
</body>

</html>
