<!DOCTYPE html>
<html lang="ru">
<head>
    <title><?php echo $title; ?></title>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/Assets/bootstrap/css/bootstrap.min.css" >
    <script defer src="/Assets/bootstrap/js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" href="/Assets/css/style.css">
    <link rel="shortcut icon" href="/Assets/img/favicon.ico" type="image/x-icon">
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container-fluid">
            <a class="navbar-brand" href="/raceviewer/allRaces">
                <img src="/Assets/img/favicon.ico" alt="HiRusSportsmen-logo" width="30" height="24" class="d-inline-block align-text-top">
                HiRusSportsmen
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
            <div class="navbar-nav">
                <a class="nav-link active" aria-current="page" href="/raceviewer/allRaces">Главная</a>
                <a class="nav-link active" href='/racetypeviewer/viewAllRacetypes'>Категории гонок</a>
                <a class="nav-link active" href='/Raceviewer/personalRaces'>Мои гонки</a>
                <a class="nav-link active" href='/raceViewer/createRace'>Добавление новой гонки</a>
                <!--<a class="nav-link" href="#">Pricing</a>
                <a class="nav-link disabled" href="#" tabindex="-1" aria-disabled="true">Disabled</a> -->
            </div>
            <form class="d-flex" action="/userauth/logoutUser" method="post" enctype="multipart/form-data">
                <button type="submit" class="btn btn-outline-success" name="logout"  value="logout">Выход</button>
            </form>
            </div>
        </div>
    </nav>

    <h1>Информация по гонке: <?php echo $race_name; ?> </h1>

    <table class="table table-hover">
        <thead>
            <tr>
                <th scope="col">ID</th>
                <th scope="col">Название</th>
                <th scope="col">Описание</th>
                <th scope="col">Дата cобытия</th>
                <th scope="col">Место проведения</th>
            </tr>
        </thead>
        <tbody>
            <tr scope='row'>
                <th><?php echo $race_id; ?></th>
                <th><?php echo $race_name; ?></th>
                <th><?php echo $race_description; ?></th>
                <th><?php echo $race_date_start .' - '. $race_date_finish; ?></th>
                <th><?php echo $race_place; ?></th>
            </tr>
        </tbody>
    </table>

    <div class="position-absolute top-0 start-50 translate-middle"></div>
        <img src="../Assets/img/logo_race/<?php echo $race_logo; ?> " width="400" class="rounded mx-auto d-block" alt="Баннер для гонки">
    </div>

    <h1>Результаты</h1>

    <table class="table table-hover">
        <thead>
        <tr>
            <th scope="col">Место</th>
            <th scope="col">Имя гонщика</th>
            <th scope="col">Номер</th>
        </tr>
        </thead>
        <tbody>

        <?php
        foreach ($massif_race_results as $race_results) {
            echo "<tr scope='row'>
                        <th>{$race_results['user_final_result']}</th>  
                        <th>{$race_results['user_id']}</th>
                        <th>{$race_results['user_number']}</th>
                    </tr> ";
        }
        ?>


</body>
</html>
