<?php
require_once '../table.php';
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=5">
  <title>Document</title>
  <link rel="stylesheet" href="css/normalize.css">
  <link rel="stylesheet" href="css/bootstrap.css">
  <link rel="stylesheet" href="css/style.css">
</head>

<body>
  <main>
    <table class="table table-striped">
      <thead>
        <tr>
          <th scope="col">Id</th>
          <th scope="col">Title</th>
          <th scope="col">Authors</th>
          <th scope="col">Pages</th>
          <th scope="col">Year</th>
        </tr>
      </thead>
      <tbody>
        <?php
createTable();
?>
      </tbody>
    </table>

    <form action="search-page.php" method="post">
      <fieldset>
        <div class="mb-3">
          <label for="text" class="form-label">Find authors or books in library:</label>
          <input type="text" name="text" class="form-control">
        </div>
        <button type="submit" class="btn btn-primary">Search</button>
      </fieldset>
    </form>

  </main>
</body>

</html>