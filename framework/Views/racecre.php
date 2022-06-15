<!DOCTYPE html>
<html>
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
            <a class="navbar-brand" href="/index/index">
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
                <a class="nav-link disabled" href='/raceViewer/createRace'>Добавление новой гонки</a>
                <!--<a class="nav-link" href="#">Pricing</a>
                <a class="nav-link disabled" href="#" tabindex="-1" aria-disabled="true">Disabled</a> -->
            </div>
            <form class="d-flex" action="/userauth/logoutUser" method="post" enctype="multipart/form-data">
                <button type="submit" class="btn btn-outline-success" name="logout"  value="logout">Выход</button>
            </form>
            </div>
        </div>
    </nav>


<?php if(isset($_SESSION['is_auth']) && $_SESSION['is_auth']): ?>

    <div class="services">
        <div class="container">
            <h2>Создать новую гонку:</h2>
            <form action=/RaceRepo/createdRace method="post">
                <div class="mb-3">
                    <label for="race_name" class="form-label">Название гонки:</label>
                    <input type="text" name="race_name" class="form-control">
                </div>
                <div class="mb-3">
                    <label for="race_description" class="form-label">Описание гонки:</label>
                    <input type="text" name="race_description" class="form-control">
                </div>
                <div class="mb-3">
                    <label for="race_participant_user_id" class="form-label">ID спортсмена:</label>
                    <input type="text" name="race_participant_user_id" class="form-control">
                </div>
                <div class="mb-3">
                    <label for="race_type_id" class="form-label">ID категории гонки:</label>
                    <input type="text" name="race_type_id" class="form-control">
                </div>
                <button type="submit" name="created" class="btn btn-primary">Создать</button>
            </form>
        </div>
    </div>

<?php else: ?>
<h3>Не авторизованный доступ</h3>
<?php endif; ?>


</body>
</html>
