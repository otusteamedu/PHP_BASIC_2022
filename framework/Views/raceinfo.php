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
<h1>Информация по гонке: <?php echo $race_name; ?> </h1>
  <table border="1">
  <thead>
  <tr>
    <th>Номер</th>
    <th>Название</th>
    <th>Описание</th>
   </tr>
    <th><?php echo $race_id; ?></th>
    <th><?php echo $race_name; ?></th>
    <th><?php echo $race_description; ?></th>
  </thead>
  <tbody>
    
    <p><a href='/racetypeviewer/viewAllRacetypes'>Посмотреть категории гонок</a></p>
    <p><a href='/raceviewer/allRaces'>Посмотреть все гонки</a></p>
    <p><a href='/Raceviewer/personalRaces'>Посмотреть свои гонки</a></p>
    <p><a href='/raceViewer/createRace'>Добавление новой гонки</a></p>
    <form action="/userauth/logoutUser" method="post" enctype="multipart/form-data">
        <button type="submit" name="logout" value="logout">Выйти</button>
    </form>
</body>
</html>
