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
<h1>Все проекты</h1>

  <table border="1">
  <thead>
  <tr>
    <th>Номер</th>
    <th>Название</th>
   </tr>
  </thead>
  <tbody>
<?php
    foreach ($massif as $massif_project) {
        echo "<tr>
                <th><a href=/taskviewer/allTasksProject?project_id={$massif_project['project_id']}>{$massif_project['project_id']}</a></th>  
                <th>{$massif_project['project_name']}</th>
             </tr> ";
    }
?>
  <p><a href='/index/index'>Вернуться на главную</a></p>
  <p><a href='/taskviewer/allTasks'>Посмотреть задачи</a></p>
</body>
</html>
