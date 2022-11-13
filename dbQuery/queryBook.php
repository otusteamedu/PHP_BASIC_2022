<?php
include 'conn/dbconn.php';
function queryBook()
{
    $conn = dbconn();
    $sql = 'SELECT * FROM Books';
    $result = $conn->query($sql);
    $result->execute();
    $data = $result->fetchAll(PDO::FETCH_ASSOC);
    return $data;
}
