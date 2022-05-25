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
<h1>Новая задача создана!</h1>

  <table border="1">
  <thead>
  <tr>
    <th>Номер</th>
    <th>Название</th>
   </tr>
    <th><?php echo $task_id; ?></th>
    <th><?php echo $task_name; ?></th>
  </thead>
  <tbody>

    <p><a href='/project/allProjects'>Посмотреть все проекты</a></p>
    <p><a href='/task/allTask'>Посмотреть все задачи</a></p>
    <p><a href='/task/personalTasks'>Посмотреть свои задачи</a></p>
    <p><a href='/index/index'>Вернуться на главную</a></p>
</body>
</html>
