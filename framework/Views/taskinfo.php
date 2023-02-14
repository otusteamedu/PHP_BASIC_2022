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
<h1>Информация по задаче</h1>

  <table border="1">
  <thead>
  <tr>
    <th>Номер</th>
    <th>Название</th>
    <th>Описание</th>
   </tr>
    <th><?php echo $task_id; ?></th>
    <th><?php echo $task_name; ?></th>
    <th><?php echo $task_description; ?></th>
    </tr>
  </thead>
  <tbody>


  <p><a href='/index/index'>Вернуться на главную</a></p>
  <p><a href='/task/allTask'>Посмотреть задачи</a></p>
</body>
</html>
