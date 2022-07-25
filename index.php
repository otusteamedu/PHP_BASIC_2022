<?php

session_start();

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gallery</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Manrope:wght@400;500;600;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css"
          integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="css/normalize.css">
    <link rel="stylesheet" href="css/main.css">
</head>
<body>
<div class="container-fluid">
    <div class="row mt-4">
        <?php if (empty($_SESSION['user_id'])): ?>
            <div class="col-md-12">
                <form action="lib/auth/handlers/auth.php" method="post" class="form-inline">
                    <div class="form-group mb-2">
                        <label for="staticEmail2" class="sr-only">Email</label>
                        <input type="text" name="login" class="form-control" id="staticEmail2"
                               placeholder="Login or email">
                    </div>
                    <div class="form-group mx-sm-3 mb-2">
                        <label for="inputPassword2" class="sr-only">Password</label>
                        <input type="password" name="password" class="form-control" id="inputPassword2"
                               placeholder="Password">
                    </div>
                    <div class="form-check">
                        <input type="hidden" name="action" value="auth">
                        <input class="form-check-input" type="checkbox" name="remember_me" id="Remember_me" checked>
                        <label class="form-check-label" for="Remember_me">Remember me</label>
                        <button type="submit" class="btn btn-primary mb-2">Confirm identity</button>
                    </div>
                </form>
                <div>
<!--                    здесь будет вывод ошибки авторизации-->
                </div>
            </div>
        <?php else: ?>
            <div class="col-md-12 d-flex justify-content-between">
                <form action="lib/functions/uploader.php" method="post" enctype="multipart/form-data">
                    <input type="file" id="idPicture" name="picture"/>
                    <input type="submit" value="Отправить!">
                </form>
                <form action="lib/auth/handlers/exit.php" method="post">
                    <button type="submit" class="btn btn-primary mb-2">Exit</button>
                </form>
            </div>
        <?php endif; ?>
        <div class="col-md-12 mt-4">
            <h1 class="text-center">Фотогалерея</h1>
        </div>
        <?php $pictures = array_diff(scandir('lib/img/gallery/'), ['.', '..']); ?>
        <?php if (!empty($pictures)): ?>
            <div class="col-md-12 mt-4 d-flex justify-content-center">
                <?php foreach ($pictures as $picture): ?>
                    <div class="card" style="width: 18rem;">
                        <a href="lib/img/gallery/<?= $picture ?>" target="_blank">
                            <img class="card-img" src="lib/img/galleryMin/<?= $picture ?>" alt="<?= $picture ?>"/>
                        </a>
                    </div>
                <?php endforeach; ?>
            </div>
        <?php else: ?>
            <div class="col-md-12 mt-4">
                <h3 class="text-center">Галерея пока пуста</h3>
            </div>
        <?php endif; ?>
    </div>
</div>
</body>
</html>