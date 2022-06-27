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
    foreach ($massif_tasks as $tasks) {
        echo "<tr>
                <th><a href=/taskviewer/infoTask?task_id={$tasks['task_id']}>{$tasks['task_id']}</a></th>  
                <th>{$tasks['task_name']}</th>
             </tr> ";
    }
?>
    <p><a href='/projectviewer/viewAllProjects'>Посмотреть все проекты</a></p>
    <p><a href='/taskviewer/allTasks'>Посмотреть все задачи</a></p>
    <p><a href='/taskviewer/personalTasks'>Посмотреть свои задачи</a></p>
    <p><a href='/index/index'>Вернуться на главную</a></p>
</body>
</html>
