<?php
    if(!empty($_POST['form_token']) && $_POST['form_token'] !== 'afg37rv32')
    {
        die('WRONG TOKEN! CSRF ATTACK!');
    }

    if(!empty($_POST['user']))
    {
        $user = $_POST['user'];
        if(!preg_match('/^[a-zA-Z0-9]+$/',$user))
            echo '<BR>Username incorrect!<BR>';
    }

    if(!empty($_POST['message']))
    {
        $secure_message = htmlspecialchars($_POST['message']);
        if(isset($_FILES['picture']) && $_FILES['picture']['size'] > 0)
        {
            $allowedExtensions = ['jpg','jpeg','png'];
            $ext = pathinfo($_FILES['picture']['name'], PATHINFO_EXTENSION);
            if(in_array($ext, $allowedExtensions))
            {
                $uniq_name = uniqid().$_FILES['picture']['name'];
                $min_uniq_name = 'min-'.$uniq_name;
                if (!getimagesize($_FILES['picture']['tmp_name'])) {
                    die('<BR>А где картинка?? А я Вам доверял....<BR>');
                    }
               
                if(move_uploaded_file($_FILES['picture']['tmp_name'],'images/'.$uniq_name))
                {
                    $percent = 0.5;
                    header('Content-Type: image/jpeg');
                    list($width, $height) = getimagesize('images/'.$uniq_name);
                    $new_width = round($width * $percent);
                    $new_height = round($height * $percent);
                    $image_p = imagecreatetruecolor($new_width, $new_height);
                    $min_uniq_name_image = imagecreatefromjpeg('images/'.$uniq_name);
                    imagecopyresampled($image_p, $min_uniq_name_image, 0, 0, 0, 0, $new_width, $new_height, $width, $height);
                    imagejpeg($image_p, 'images/'.$min_uniq_name);
                   // imagejpeg($image_p, NULL, 75);
                    imagedestroy($image_p);
                } else {
                    unset($uniq_name);
                }
            }
        }
        $data = [];
        if(file_exists('db.json'))
            $data = json_decode(file_get_contents('db.json'), true);
        $element = [
            'user' => isset($_POST['user']) ? $user : 'anonymous',
            'message' => $secure_message,
            'date' => date('d.m.Y')
        ];
        if(isset($min_uniq_name))
        {
            $element['picture'] = $min_uniq_name;
            $element['picture_full'] = $uniq_name;
        }
        $data[] = $element;
        file_put_contents('db.json',json_encode($data));
    }

?>
<form action="/index.php" method="post" enctype="multipart/form-data">
    <label for="user">Имя пользователя:</label>
    <input type="text" name="user" /><br>
    <label for="message">Сообщение:</label>
    <textarea name="message"></textarea><br>
    <input type="file" name="picture" accept=".jpg,.jpeg,.png" />
    <input type="hidden" name="form_token" value="afg37rv32"/>
    <input type="submit" value="Отправить!">
</form>
<?php
    $data = [];
    if(file_exists('db.json'))
        $data = json_decode(file_get_contents('db.json'), true);
    foreach ($data as $message) {
        echo "<hr><br><b>{$message['user']}</b> - <i>{$message['date']}</i><br><br>{$message['message']}";
        if(isset($message['picture']))
        {
            if(isset($message['picture_full']))
            {
                ECHO "<a href=\"/images/{$message['picture_full']}\"><img width=150px src=\"/images/{$message['picture']}\" /></a>";
            }
        }
    }
?>

