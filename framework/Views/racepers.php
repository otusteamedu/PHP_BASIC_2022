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
<h1>Список твоих гонок</h1>

  <table border="1">
  <thead>
  <tr>
    <th>Номер</th>
    <th>Название</th>
   </tr>
  </thead>
  <tbody>

  <?php // var_dump(session_id()); var_dump($_SESSION['user_id']); ?>

<?php
    foreach ($massif_races as $races) {
        echo "<tr>
                <th><a href=/raceviewer/infoRace?race_id={$races['race_id']}>{$races['race_id']}</a></th>  
                <th>{$races['race_name']}</th>
             </tr> ";
    }
?>
    <p><a href='/racetypeviewer/viewAllRacetypes'>Посмотреть категории гонок</a></p>
    <p><a href='/raceviewer/allRaces'>Посмотреть все гонки</a></p>
    <p><a href='/raceViewer/createRace'>Добавление новой гонки</a></p>
    <form action="/userauth/logoutUser" method="post" enctype="multipart/form-data">
        <button type="submit" name="logout" value="logout">Выйти</button>
    </form>

</body>
</html>
