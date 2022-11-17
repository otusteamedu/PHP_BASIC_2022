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
  <h4 class="login">You must be logged in to use the library</h4>
  <form action="../auth.php" method="post" enctype="multipart/form-data">
    <fieldset>
      <label for="user">User:</label>
      <input type="text" id="user" name="user">
      <br>
      <br>
      <label for="password">Password:</label>
      <input type="password" id="password" name="password">
      <br>
      <br>
      <input type="submit" value="Log in">
    </fieldset>
  </form>
</body>