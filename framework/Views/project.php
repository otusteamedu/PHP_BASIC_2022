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
    foreach ($massi as $massi_project) {
        echo "<tr>
                <th><a href=/task/projectTasks?project_id={$massi_project['project_id']}>{$massi_project['project_id']}</a></th>  
                <th>{$massi_project['project_name']}</th>
             </tr> ";
    }
?>

  <p><a href='/index/index'>Вернуться на главную</a></p>
  <p><a href='/task/allTask'>Посмотреть задачи</a></p>
</body>
</html>
