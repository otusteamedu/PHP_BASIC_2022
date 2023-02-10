<?php require_once 'header.php';?>

<h1>404</h1>
<h2>Page not found</h2>

<?php
if (isset($debug_info)) {
  echo '<pre>', print_r($debug_info), '</pre>';
}?>
</body>

</html>
