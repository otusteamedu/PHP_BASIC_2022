<?php require_once 'header.php';?>
<div>
  <h4 class="upper"><a href="/personal/index">Return to personal page</a></h4>
</div>
<form method="POST" action="/Chat/addMessage" enctype="multipart/form-data">
  <label for="message">Message:</label><br>
  <input type="text" name="message" required><br>
  <input type="submit" value="Send">
</form>
<br>
<nav><?php echo $pagination; ?></nav>
<hr>
<br>
<?php
if (isset($error)): ?>
<h2 style="color: red"><?php echo $error; ?></h2>
<?php endif;

foreach ($messages as $message) {
  $message['message_text'] = htmlspecialchars($message['message_text']);
  echo "<h5>Message #{$message['id']} from {$message['username']} {$message['message_date']}</h5><br>";
  echo "{$message['message_text']}<br>";
  echo "<br><hr><br>";
}
?>
</body>

</html>