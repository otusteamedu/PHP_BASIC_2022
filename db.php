<?php
function db_connect() {
    return new PDO('mysql:host=localhost;dbname=otus_lib','root','root',[
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
        PDO::FETCH_ASSOC => true
    ]);
}

function db_get_all_messages() {
    $pdo = db_connect();
    $result = $pdo->query('select users.username, messages.message, messages.created_at, messages.picture, messages.picture_full, messages.id from messages 
                                        JOIN users ON users.id = messages.user_id', PDO::FETCH_ASSOC);
    $result->execute();
    return $result->fetchAll();
}

function db_add_message($user_id, $message, $picture = null, $picture_full = null) {
    $pdo = db_connect();
    $result = $pdo->prepare('insert into messages(user_id, message, picture, picture_full) values(?,?,?,?)');
    $result->execute([$user_id, $message, $picture, $picture_full]);
}

function db_add_newuser($username, $hash_paswd, $remember_token) {
    $pdo = db_connect();
    $result = $pdo->prepare('insert into users(username, hash_paswd, remember_token) values(?,?,?)');
    $result->execute([$username, $hash_paswd, $remember_token]);
}


function db_delete_message($message_id) {
    $pdo = db_connect();
    $result = $pdo->prepare('delete from messages where id = ?');
    $result->execute([$message_id]);
}



function authenticate($username, $pass, $remember) {
    $pdo = db_connect();
    $query  = $pdo->prepare('select * from users where username = ?');
    $query ->execute([$username]);
    $result = $query->fetch(PDO::FETCH_ASSOC);
    if (!$result) {
        return false;
    } else {
        if (password_verify($pass,$result['hash_paswd'])) {
            $uspeh =1; 
            $token = $remember ? uniqid() : null;
            $query = $pdo->prepare('update users set remember_token = ? where id = ?');
            $query->execute([$token,$result['id']]);
            $result['token'] = $token;
            return $result;
        } else {
            $uspeh =0; 
        }
    }    
    return false;
}

function authenticate_by_token($token) {
    $pdo = db_connect();
    $result = $pdo->prepare('select * from users where remember_token = ?');
    $result->execute([$token]);
    $count = $result->rowCount();
    if($count > 0)
    {
        return $result->fetch();
    }
    return false;
}


?>
