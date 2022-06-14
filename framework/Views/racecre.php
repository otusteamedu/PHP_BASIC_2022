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



<?php if(isset($_SESSION['is_auth']) && $_SESSION['is_auth']): ?>
<h1>Создать новую гонку:</h1>
<form action=/racerepo/createdRace method="post">
        <label for="race_name">Название гонки:</label>
        <input type="text" name="race_name" /><br>
        <label for="race_description">Описание гонки:</label>
        <input type="text" name="race_description" /><br>
        <label for="race_responsibly_user_id">ID спортсмена:</label>
        <input type="text" name="race_responsibly_user_id" /><br>
        <label for="race_racetype_id">ID категории гонки:</label>
        <input type="text" name="race_racetype_id" /><br>
        <input type="submit" name="created" value="Создать">
</form>
<?php else: ?>
<h3>Не авторизованный доступ</h3>
<?php endif; ?>

<p><a href='/racetypeviewer/viewAllRacetypes'>Посмотреть категории гонок</a></p>
<p><a href='/raceviewer/allRaces'>Посмотреть все гонки</a></p>
<p><a href='/Raceviewer/personalRaces'>Посмотреть свои гонки</a></p>
<form action="/userauth/logoutUser" method="post" enctype="multipart/form-data">
    <button type="submit" name="logout" value="logout">Выйти</button>
</form>
</body>
</html>
