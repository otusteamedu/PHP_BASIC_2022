<?php
function dbConnect() {
    return new PDO('mysql:host=127.0.0.1;port=3306;dbname=gallery','root','',[
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
        PDO::FETCH_ASSOC => true
    ]);
}

function userAuth(string $username, string $password, $remember){
    $pdo = dbConnect();
    $result = $pdo->prepare('SELECT uid, username, password FROM users WHERE username = ?', [PDO::FETCH_ASSOC]);
    $result->execute([$username]);
    $count = $result->rowCount();
    if($count > 0 && !empty($remember))
    {
        $user_data = $result->fetch();
        if (password_verify($password, $user_data['password'])){
            $token = $remember ? uniqid() : null;
            $result = $pdo->prepare('update users set remember_token = ? where uid = ?');
            $result->execute([$token,$user_data['uid']]);
            $user_data['token'] = $token;
            return $user_data;
        }
    } else {
        return $result->fetch();
    }
    return false;
}

function authenticateByToken($token) {
    $pdo = dbConnect();
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


