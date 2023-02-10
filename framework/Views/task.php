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
<h1>Ваши задачи</h1>

  <table border="1">
  <thead>
  <tr>
    <th>Номер</th>
    <th>Название</th>
   </tr>
  </thead>
  <tbody>
<?php
    foreach ($massi as $massi_task) {
        echo "<tr>
                <th><a href=/task/infoTask?task_id={$massi_task['task_id']}>{$massi_task['task_id']}</a></th>  
                <th>{$massi_task['task_name']}</th>
             </tr> ";
    }
?>
    <p><a href='/project/allProjects'>Посмотреть все проекты</a></p>
    <p><a href='/task/allTask'>Посмотреть все задачи</a></p>
    <p><a href='/task/personalTasks'>Посмотреть свои задачи</a></p>
    <p><a href='/index/index'>Вернуться на главную</a></p>
</body>
</html>
