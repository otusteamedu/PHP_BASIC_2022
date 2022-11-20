<?php
require_once '../../lib.php';
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  <link rel="stylesheet" href="../css/normalize.css" />
  <link rel="stylesheet" href="../css/style.css" />
</head>

<body>
  <main>
      <?php
$id = basename(__FILE__, '.php');
$files = gallery($id);
$name = array_pop($files);

echo '<h1 class="book-title">' . $name . '</h1>';
echo "<div class='images'>";
foreach ($files as $value) {

    echo '<a href="' . '../images/' . $value . '" target = "_blank"><img src="' . '../mini/' . $value . '"></a>';
}
echo "</div>";
?>
  </main>
</body>

</html>
