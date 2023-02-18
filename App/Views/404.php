<?php require_once 'header.php';?>
<div class="container">
  <?php
if (isset($debug_info)) {
  echo  '<h1 class="upper">404</h1>';
  echo '<h2>Page not found</h2>';
  echo '<pre>', print_r($debug_info), '</pre>';
} else {
  echo '<h1 class="center-heading">404</h1>';
  echo '<h2>Page not found</h2>';
}?>
</div>
</body>

</html>
