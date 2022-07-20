<?php
require_once 'function/function.php'; //указать прямой путь на сервере
declare (strict_types=1);
?>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Nunito:ital,wght@0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="css/style.css">
    <title>Photo Gallery</title>

</head>
<body>
<div class = container-form>
    <form action="/index.php" method= "post">
        <div>
            <label for="userName"> User Name:</label>
            <input type="text" name="userName" />
        </div>
        <div>
            <label for="img">Photo</label>
            <input type="file" name="img">
        </div>
        <div>
            <input type="submit" value="Upload">
        </div>
        
    </form>

</div>
<div class = container-photo-gal>
    <div class = card>

    </div>
</div>    
</body>
</html>