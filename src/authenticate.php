<?php
require '../conn/dbconn.php';
function authenticate($username)
{
    $pdo = dbconn();
    $result = $pdo->prepare('SELECT password FROM users where username =:username');
    $result->execute(array(':username' => $username));
    $output = $result->fetchAll(PDO::FETCH_ASSOC);
    $hash_pass = $output[0]['password'];
    return $hash_pass;
}

session_start();
if (empty($_SESSION['token'])) {
    header('Location: ../template/authForm.php');
} else {
    header('Location: ../template/templateAdmin.php');
}

if (!empty($_POST['user']) && !empty($_POST['password'])) {
    if (password_verify($_POST['password'], authenticate($_POST['user']))) {
        header('Location: ../template/templateAdmin.php');
        $_SESSION['username'] = $_POST['user'];
        $_SESSION['token'] = uniqid();
    } else {
        header('Location: ../template/templateGuest.php');
    }
}
