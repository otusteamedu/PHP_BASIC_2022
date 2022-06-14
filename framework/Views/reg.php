<!DOCTYPE html>
<html>
<head>
    <title><?php echo $title; ?></title>
    <style>
        body {
            text-align: center;
        }

        h1 {
            margin-top: 20%;
        }
    </style>
</head>
<body>


<h1><?php echo $resault; ?></h1>


<?php if(isset($_SESSION['is_auth']) && $_SESSION['is_auth']): ?>
<h3><a href='/raceviewer/allRaces'>Можешь посмотреть гонки!</a></h3>

<?php else: ?>
<h3>Не авторизованный доступ</h3>
<?php endif; ?>


<form action="/userauth/logoutUser" method="post" enctype="multipart/form-data">
<button type="submit" name="logout" value="logout">Выйти</button>
</form>
</body>
</html>
