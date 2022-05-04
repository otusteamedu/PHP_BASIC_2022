<?php
    if(!empty($_GET['action']) && $_GET['action'] === 'delete' && !empty($_GET['book_id']))
    {
        db_delete_book($_GET['book_id']);
    }

    if(!empty($_POST['form_token']) && $_POST['form_token'] !== 'afg37rv32')
    {
        echo '<p class="error">WRONG TOKEN! CSRF ATTACK!</p>';
    }

    if(!empty($_POST['user_id']))
    {
        $user = $_POST['user_id'];
        if(!preg_match('/^[a-zA-Z0-9]+$/',$user))
            echo '<p class="error">Некорректное имя пользователя!</p>';
    }

    if(!empty($_POST['book_name']) && !empty($_POST['book_author']))
    {
        $secure_book_name = htmlspecialchars($_POST['book_name']);
        $secure_book_author = htmlspecialchars($_POST['book_author']);
    
        if(!empty($_POST['book_created_dt']))
        {
            $book_created_dt = $_POST['book_created_dt'];
            if(!preg_match('/^[0-9]{4}/',$book_created_dt))
                echo '<p class="error">Недопустимый формат!</p>';
        }

        if(!empty($_POST['book_page']))
        {
            $book_page = $_POST['book_page'];
            if(!preg_match('/^[0-9]{4}/',$book_page))
                echo '<p class="error">Недопустимый формат!</p>';
        }

        if(isset($_FILES['picture']) && $_FILES['picture']['size'] > 0)
        {
            $allowedExtensions = ['jpg','jpeg','png'];
            $ext = pathinfo($_FILES['picture']['name'], PATHINFO_EXTENSION);
            if(in_array($ext, $allowedExtensions))
            {
                $uniq_name = uniqid().$_FILES['picture']['name'];
                $min_uniq_name = 'min-'.$uniq_name;
                if (!getimagesize($_FILES['picture']['tmp_name']))
                {
                    echo '<p class="error">Некорректный файл!</p>';
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
                    imagedestroy($image_p);
                } else
                {
                    unset($uniq_name);
                }
            }
        }
        $element = [
            'user_id' => $_SESSION['user_id'],
            'book_name' => $secure_book_name,
            'book_author' => $secure_book_author,
            'book_page'=> $book_page,
            'book_created_dt'=> $book_created_dt,

        ];
        if(isset($min_uniq_name))
        {
            $element['picture'] = $min_uniq_name;
            $element['picture_full'] = $uniq_name;
        }

        $result = db_add_book($element['book_name'], $element['book_author'], $element['book_page'], $element['book_created_dt']);
        if($result !== false) 
        {
            $_SESSION['book_id'] = $result['book_id'];
            $element['book_id'] = $result['book_id'];
            db_add_images($element['user_id'], $element['book_id'], $element['picture'], $element['picture_full']);
        }
    }
?>