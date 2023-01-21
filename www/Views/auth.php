<?php require_once 'header.php';?>

<div>
  <div>
    <h4>Вход в систему</h4>
  </div>
  <div>
    <h4><a href="/registration/index">Регистрация</a></h4>
  </div>
</div>
<div>
  <?php if (isset($error)): ?>
  <h2 style="color: red"><?php echo $error; ?></h2>
  <?php endif;?>
  <form action="/auth/auth" method="post" enctype="multipart/form-data">
    <div>
      <div>
        <label for="user">User:</label>
      </div>
      <div>
        <input type="text" id="user" name="user" required>
      </div>
      <div>
        <label for="password">Password:</label>
      </div>
      <div>
        <input type="password" id="password" name="password" required>
      </div>
      <div>
        <input type="submit" value="Log in!">
      </div>
    </div>
  </form>
</div>

</body>

</html>