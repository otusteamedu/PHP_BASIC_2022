<?php ;?>

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
    <h5>Add books to the library:</h5>
    <form action="../add-book.php" method="post" enctype="multipart/form-data">
      <fieldset>
        <div class="mb-3">
          <label for="title" class="form-label">Title:</label>
          <input type="text" name="title" class="form-control" required>
        </div>
        <div class="mb-3">
          <label for="author" class="form-label">Author:</label>
          <input type="text" name="author" class="form-control" required>
        </div>
        <div class="mb-3">
          <label for="pages" class="form-label">Number of pages:</label>
          <input type="text" name="pages" class="form-control" required>
        </div>
        <div class="mb-3">
          <label for="year" class="form-label">Year:</label>
          <input type="text" name="year" class="form-control" required>
        </div>
        <div class="mb-3">
          <label for="image[]" class="form-label">Images:</label>
          <input type="file" name="image[]" class="form-control" multiple="multiple">
        </div>
        <button type="submit" class="btn btn-primary">Add book</button>
      </fieldset>
    </form>
  </main>
</body>

</html>