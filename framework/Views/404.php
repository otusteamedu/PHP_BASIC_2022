<!DOCTYPE html>
<html lang="ru">
<head>
    <title>404 - Not Found</title>
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

<h1>404</h1>

<h2><?php echo $result; ?></h2>
<a href='/index/index'>Вернуться на главную</a>

<?php
$testGD = get_extension_funcs("gd"); // Grab function list
if (!$testGD){ echo "GD not even installed."; exit; }
echo"<pre>".print_r($testGD,true)."</pre>"; ?>




</body>
</html>
