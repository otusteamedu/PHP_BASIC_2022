<?php
function dbconn()
{
    $settings = parse_ini_file("connection.ini");
    $host = $settings['host'];
    $dbname = $settings['dbname'];
    $username = $settings['username'];
    $password = $settings['password'];
    $conn = new PDO('mysql:dbname=' . $dbname . ';host=' . $host, $username, $password);

    return $conn;
}
