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


<h1><?php echo $resault; ?></h1>

<?php if(isset($_SESSION['is_auth']) && $_SESSION['is_auth']): ?>
<a href='/taskviewer/allTasks'>Можешь посмотреть задачи, ты же авторизован!</a>
<h2>Создать новую задачу:</h2>
<form action=/taskrepo/createdTask method="post">
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

<form action="/userauth/logoutUser" method="post" enctype="multipart/form-data">
<button type="submit" name="logout" value="logout">Выйти</button>
</body>
</html>
