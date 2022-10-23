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
        <div id="tiles">
            <!-- плитка -->
            <div class="tile">
                <img class="feature_icon" src="/images/icon1.png" alt="значок Mobile Application">
                <h3 class="tile_header">Mobile Application</h3>
                <p>
                    Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et
                    dolore magna aliqua.
                </p>
                <a href="#" class="expand" id="expand_1">Expand <img src="images/arrow_r_purple.svg" alt="Развёрнутое описание"></a>
            </div>

        </div>
         <!-- блок навигации -->
        <div class="explore">
            <button type="button">Explore all <img src="images/arrow_r_beige.svg" alt="Стрелка вправо"></button>
        </div>
    </main>

    <footer>
       <?php include 'foot.php'; ?>
    </footer>
</body>

</html>
