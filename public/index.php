<?php
require_once '../gallery.php';
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  <link rel="stylesheet" href="public/css/normalize.css" />
  <link rel="stylesheet" href="public/css/style.css" />
</head>

<body>
  <header>Header</header>
  <main>
    <div class='images'>
  <?php
gallery();
?>
  </div>

  <form action = "upload.php" method="post" enctype="multipart/form-data">
  <fieldset>
  <legend>Upload your photo:</legend>
  <label for="file">Photo:</label>
  <input type="file" name="file">
  <br>
  <br>
  <input type="submit" value="Upload">
  </fieldset>
</form>

</main>
  <footer>Footer</footer>
</body>

</html>
