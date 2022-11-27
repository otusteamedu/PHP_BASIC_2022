<?php
require 'conn/dbconn.php';
function authenticate($username)
{
    $pdo = dbconn();
    $result = $pdo->prepare('SELECT password FROM users where username =:username');
    $result->execute(array(':username' => $username));
    $output = $result->fetchAll(PDO::FETCH_ASSOC);
    $hash_pass = $output[0]['password'];
    return $hash_pass;
}
