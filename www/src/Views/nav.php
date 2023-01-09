<?php
$domain = "http://" . $_SERVER['SERVER_NAME'];
?>

<!DOCTYPE html>
<html>

<head>
  <title><?php echo $title; ?></title>
  <style>
  nav {
    margin-bottom: 50px;
  }

  a {
    margin-right: 20px;
  }

  h2 {
    text-align: center;
  }
  </style>
</head>

<body>
  <nav>
    <br>
    <?php
echo "<a href=" . $domain . ">Home page</a>";
echo "<a href=" . $domain . "/index/test>Test page</a>";
echo "<a href=" . $domain . "/index/new>New page</a>";
?>
    <br>
  </nav>
  <h2>This is a <?php echo $page; ?> page!</h2>
</body>

</html>
