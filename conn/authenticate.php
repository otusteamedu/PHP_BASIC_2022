<?php
require 'dbconn.php';
function authenticate($username, $password)
{
    $pdo = dbconn();
    $result = $pdo->prepare('SELECT 1 FROM users where username = ? and password = ?');
    $result->execute([$username, md5($password)]);
    return $result->rowCount() > 0;
}
