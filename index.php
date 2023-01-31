<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title>Demo</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="css/style.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
  </head>
  <body>

<main>

  <header class="w-100 p-4 position-absolute top-0 start-0">
    <div class="container">
      <div class="d-flex flex-wrap align-items-center justify-content-center justify-content-lg-start">
        <a href="/" class="d-flex align-items-center mb-2 mb-lg-0 text-white text-decoration-none">
          <img class="me-lg-4" alt="logo" src="img/logo.svg">
        </a>
<?php
$menu = [];
$menu['Home'] = ['item1', 'item2'];
$menu['Service'] = ['item1', 'item2'];
$menu['Work'] = ['item1', 'item2'];
$menu['Work2'] = ['item1'=>['item11', 'item12'], 'item2'];
$menu['Contact'] = ['item1', 'item2'];

function showSubMenu($subMune) {
  echo '<ul class="dropdown-menu">';
  foreach ($subMune as $key => $subMuneData) {
    if(is_array($subMuneData)){
      $subMenuName = $key;
      $hasSubMenu = true;
    } else {
      $subMenuName = $subMuneData;
      $hasSubMenu = false;
    }
    echo '<li><a href="#" class="dropdown-item">'.$subMenuName.'</a>';
          if ($hasSubMenu) showSubMenu($subMuneData);
    echo '</li>';
  }
  echo '</ul>';
}


?>
        <ul class="nav col-12 col-lg-auto me-lg-auto mb-2 justify-content-center mb-md-0">
          <?php

            foreach ($menu as $main => $subMune) {
            ?>
              <li class="dropdown">
              <a href="#" class="nav-link dropdown-icon px-3" role="button" data-bs-toggle="dropdown" aria-expanded="false"><?=$main?></a>
            <?
              showSubMenu($subMune);
            ?>
              </li>
            <?
            }
          ?>
          
        </ul>

        <div class="text-end">
          <button type="button" class="btn-login btn me-2"><span>Log In</span></button>
          <button type="button" class="btn-signup btn"><span>Sign Up</span></button>
        </div>
      </div>
    </div>
  </header>

  <div class="slider">
    <div class="container h-100">
      <div class="row mt-5 mt-lg-0 h-100 w-100 flex-wrap align-items-end">
        <div class="left-block col-12 col-lg-6">
          <h1><span>Bootstrap 5 theme</span> <br>crafted by ThemeWagon</h1>
          <p>ThemeWagon offers an wide array of category-oriented <br>Free and Premium  Bootstrap HTML Templates and Themes.</p>
          <button type="button" class="btn check-demo"><span>Check Demo</span></button>
        </div>
        <div class="right-block col-12 col-lg-6">
          <img class="w-100 mt-4 mt-lg-0" alt="background image" src="img/slider-illustration.svg">
        </div>
      </div>
    </div>
    <div class="elipse-slider-bg"></div>
    <div class="right-slider-bg d-none d-lg-block"></div>
  </div>

  <div class="list-logo">

  </div>

  <div class="bg"></div>
  <footer>
    <?=date('Y')?>
  </footer>

</main>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Nunito:ital,wght@0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;0,1000;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900;1,1000&display=swap" rel="stylesheet">

  </body>
</html>
