<?php
    require 'src/hours_rus.php';
    require 'src/minutes_rus.php';

    $title = 'Connection services';
    require 'head.php';
?>

<body>
    <header>
        <h1>Services that connect you to your users</h1>
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

        <div class="tile">
            <img class="feature_icon" src="images/icon2.png" alt="значок Web Application">
            <h3 class="tile_header">Web Application</h3>
            <p>
                Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et
                dolore magna aliqua.
            </p>
            <a href="#" class="expand" id="expand_2">Expand <img src="images/arrow_r_purple.svg" alt="Развёрнутое описание"></a>
        </div>

        <div class="tile">
            <img class="feature_icon" src="images/icon3.png" alt="значок User Interface Design">
            <h3 class="tile_header">User Interface Design</h3>
            <p>
                Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et
                dolore magna aliqua.
            </p>
            <a href="#" class="expand" id="expand_3">Expand <img src="images/arrow_r_purple.svg" alt="Развёрнутое описание"></a>
        </div>

        <div class="tile">
            <img class="feature_icon" src="images/icon4.png" alt="значок Strategy and Branding">
            <h3 class="tile_header">Strategy and Branding</h3>
            <p>
                Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et
                dolore magna aliqua.
            </p>
            <a href="#" class="expand" id="expand_4">Expand <img src="images/arrow_r_purple.svg" alt="Развёрнутое описание"></a>
        </div>

        <div class="tile">
            <img class="feature_icon" src="images/icon5.png" alt="значок Performance Marketing">
            <h3 class="tile_header">Performance Marketing</h3>
            <p>
                Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et
                dolore magna aliqua.
            </p>
            <a href="#" class="expand" id="expand_5">Expand <img src="images/arrow_r_purple.svg" alt="Развёрнутое описание"></a>
        </div>

        <div class="tile">
            <img class="feature_icon" src="images/icon6.png" alt="значок Project Management">
            <h3 class="tile_header">Project Management</h3>
            <p>
                Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et
                dolore magna aliqua.
            </p>
            <a href="#" class="expand" id="expand_6">Expand <img src="images/arrow_r_purple.svg" alt="Развёрнутое описание"></a>
        </div>
        </div>
         <!-- блок навигации -->
        <div class="explore">
            <button type="button">Explore all <img src="images/arrow_r_beige.svg" alt="Стрелка вправо"></button>
        </div>
    </main>

    <footer>
        <nav>
            <p class="nav_item"><a class="nav_link" href="math_power.php">Возведение в степень</a></p>
            <p class="nav_item"><a class="nav_link" href="math_operations.php">Математические операции</a></p>
        </nav>
       <?php include 'foot.php'; ?>
    </footer>
</body>

</html>
