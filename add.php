<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
<form action="/api/createBook.php" enctype="multipart/form-data" method="post">
    <label for="name" class="px-2">Название книги</label>
    <input type="text" name="bookname" class="px-2"/><br>
    <label for="pages" class="px-2">Количество страниц</label>
    <input type="number" name="pages" class="px-2"/><br>
    <label for="author" class="px-2">Автор</label>
    <input type="text" name="author" class="px-2"/><br>
    <label for="description" class="px-2">Описание</label>
    <textarea name="description"> </textarea>
    <br>
    <p>Загрузите фото обложки</p>
    <input type="file" name="main-picture" multiple accept="image/*,image/jpeg">
    <p>Загрузите до трех фото книги</p>
    <input type="file" name="picture1" multiple accept="image/*,image/jpeg">
    <input type="file" name="picture2" multiple accept="image/*,image/jpeg">
    <input type="file" name="picture3" multiple accept="image/*,image/jpeg">
    <input type="submit" value="Отправить">
</form>
</body>
</html>
