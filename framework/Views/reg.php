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

<h1>Привет, <?php echo $name; ?></h1>
<h2><?php echo $resault; ?></h2>

<?php if(isset($_SESSION['is_auth']) && $_SESSION['is_auth']): ?>
<a href='/task/allTask'>Можешь посмотреть задачи, ты же авторизован!</a>
<h2>Создать новую задачу:</h2>
<form action=/task/createdTasks method="post">
        <label for="task_name">Название задачи:</label>
        <input type="text" name="task_name" /><br>
        <label for="task_description">Описание задачи:</label>
        <input type="text" name="task_description" /><br>
        <label for="task_responsibly_user_id">ID ответственного:</label>
        <input type="text" name="task_responsibly_user_id" /><br>
        <label for="task_project_id">ID проекта:</label>
        <input type="text" name="task_project_id" /><br>
        <input type="submit" name="created" value="Создать">
</form>
<?php else: ?>
<h3>Не авторизованный доступ</h3>
<?php endif; ?>
<a href='/index/index'>Вернуться на главную</a>
</body>
</html>
