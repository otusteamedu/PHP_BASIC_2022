<?php ;?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  <link rel="stylesheet" href="css/normalize.css" />
  <link rel="stylesheet" href="css/style.css" />
</head>

<body>
  <header>Header</header>
  <main>
    <div class='images'>
    <?php
$dir = './img';
$files = array_diff(scandir($dir), array('..', '.'));

foreach ($files as $value) {

    $image = "./img/$value";
    echo '<a href="' . $image . '" target = "_blank"><img src="' . $image . '"></a>';
}?>

  </div>
</main>
  <footer>Footer</footer>
  <script src="js/script.js"></script>
</body>

</html>


