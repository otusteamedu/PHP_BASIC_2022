<?php
    require 'src/hours_rus.php';
    require 'src/minutes_rus.php';

    $title = 'Connection services';
    require 'head.php';
    require 'menu.php';
?>

<body>
    <header>
        <h1>Services that connect you to your users</h1>
    </header>

    <div class="d-flex">
        <aside class="w-25">
            <!-- <summary>Меню</summary> -->
            <?php
                foreach ($menu as $razdel) {
                    echo sprintf('<p class="menu_razdel"><a href="%s">%s</a></p>', $razdel[1], $razdel[0]);
                    if ($razdel[2]) {
                        echo '<details><ul>';
                        foreach ($razdel[2] as $subrazdel) {
                            echo sprintf('<li><a href="%s">%s</a></li>', $subrazdel[1], $subrazdel[0]);
                        }
                        echo '</ul></details>';
                    }
                }
            ?>
        </aside>

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
    </div>

    <footer>
       <?php include 'foot.php'; ?>
    </footer>
</body>

</html>
