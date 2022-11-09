<?php
$conn = new PDO("mysql:host=127.0.0.1;dbname=otus", "root", "qweasdzxc0");
$sql = "SELECT * FROM Books";
$result = $conn->query($sql);

return $result;
