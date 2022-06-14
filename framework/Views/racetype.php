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
<h1>Все категории</h1>

  <table border="1">
  <thead>
  <tr>
    <th>Номер</th>
    <th>Название</th>
   </tr>
  </thead>
  <tbody>
<?php
    foreach ($massif as $massif_racetype) {
        echo "<tr>
                <th><a href=/raceviewer/allRacesType?racetype_id={$massif_racetype['type_id']}>{$massif_racetype['type_id']}</a></th>  
                <th>{$massif_racetype['type_name']}</th>
             </tr> ";
    }
?>

    <p><a href='/raceviewer/allRaces'>Посмотреть все гонки</a></p>
    <p><a href='/Raceviewer/personalRaces'>Посмотреть свои гонки</a></p>
    <p><a href='/raceViewer/createRace'>Добавление новой гонки</a></p>
    <form action="/userauth/logoutUser" method="post" enctype="multipart/form-data">
        <button type="submit" name="logout" value="logout">Выйти</button>
    </form>


</body>
</html>
