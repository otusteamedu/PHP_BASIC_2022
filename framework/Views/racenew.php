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
<h1>Новая гонка создана!</h1>
  <table border="1">
  <thead>
  <tr>
    <th>Номер</th>
    <th>Название</th>
   </tr>
    <th><?php echo $race_id; ?></th>
    <th><?php echo $race_name; ?></th>
  </thead>
  <tbody>
    <p><a href='/racetypeviewer/viewAllRacetypes'>Посмотреть категории гонок</a></p>
    <p><a href='/raceviewer/allRaces'>Посмотреть все гонки</a></p>
    <p><a href='/raceviewer/personalRaces'>Посмотреть свои гонки</a></p>
    <p><a href='/raceViewer/createRace'>Добавление новой гонки</a></p>
    <p><a href='/index/index'>Вернуться на главную</a></p>
</body>
</html>
