<?php require_once 'header.php';?>

<div>
  <div>
    <h4 class="upper"><a href="/">Login</a></h4>
  </div>
  <div>
    <h4>Registration</h4>
  </div>
</div>
<div>
  <?php
  if (isset($error)): ?>
  <h2 style="color: red"><?php echo $error; ?></h2>
  <?php endif;?>
  <?php
  if (isset($message)): ?>
  <h2 style="color: green"><?php echo $message; ?></h2>
  <?php endif;?>
  <form action="/registration/registration" method="post" enctype="multipart/form-data">
    <div>
      <div>
        <label for="user">Your name:</label>
      </div>
      <div>
        <input type="text" id="user" name="user" required>
      </div>
      <div>
        <label for="password">Your password:</label>
      </div>
      <div>
        <input type="password" id="password" name="password" required>
      </div>
      <div>
        <input type="submit" value="Register me!">
      </div>
    </div>
  </form>
</div>

</body>

</html>