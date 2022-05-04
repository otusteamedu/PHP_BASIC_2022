<?php
function db_connect_users() {
    return new PDO('mysql:host=localhost;dbname=otus_lib','root','root',[
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
        PDO::FETCH_ASSOC => true
    ]);
}

function authenticate($username, $pass, $remember) {
    $pdo = db_connect_users();
    $query  = $pdo->prepare('select * from users where username = ?');
    $query ->execute([$username]);
    $result = $query->fetch(PDO::FETCH_ASSOC);
    if (!$result) {
        return false;
    } else {
        if (!empty($result['username']) && ($result['username']) === $username)   {
            if (password_verify($pass,$result['hash_paswd'])) {
                $token = $remember ? uniqid() : null;
                $query = $pdo->prepare('update users set remember_token = ? where id = ?');
                $query->execute([$token,$result['id']]);
                $result['token'] = $token;
                return $result;
            }
            return false;
        } 
            
    }    
    return false;
}

function authenticate_by_token($token) {
    $pdo = db_connect_users();
    $result = $pdo->prepare('select * from users where remember_token = ?');
    $result->execute([$token]);
    $count = $result->rowCount();
    if($count > 0)
    {
        return $result->fetch();
    }
    return false;
}

function db_add_newuser($username, $hash_paswd, $remember_token) {
    $pdo = db_connect_users();
    $result = $pdo->prepare('insert into users(username, hash_paswd, remember_token) values(?,?,?)');
    $result->execute([$username, $hash_paswd, $remember_token]);
}

?>