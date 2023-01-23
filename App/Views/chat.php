<?php require_once 'header.php';?>
<div>
  <h4><a href="/personal/index">Вернуться на персональную страницу</a></h4>
</div>
<form method="POST" action="/Chat/addMessage" enctype="multipart/form-data">
  <label for="message">Сообщение:</label><br>
  <input type="text" name="message" required><br>
  <input type="submit" value="Отправить">
</form>
<br>
<hr>
<br>

<?php
if (isset($error)): ?>
<h2 style="color: red"><?php echo $error; ?></h2>
<?php endif;

foreach ($messages as $message) {
  $message['message_text'] = htmlspecialchars($message['message_text']);
  echo "<h3>Сообщение #{$message['id']} от {$message['username']} {$message['message_date']}</h3><br>";
  echo "{$message['message_text']}<br>";
  echo "<br><hr><br>";
}
?>
</body>

</html>