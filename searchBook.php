<?php
function searchBook($query)
{
    $conn = new PDO("mysql:host=127.0.0.1;dbname=otus", "root", "qweasdzxc0");
    $sql = "
            SELECT * 
            FROM `books`
            WHERE `name` LIKE '%$query%' OR `author` LIKE '%$query%' ";
    $pstmt = $conn->prepare($sql);
    $pstmt->execute();
    $books = $pstmt->fetchAll(PDO::FETCH_ASSOC);

    return $books;
}
if (!empty($_POST['query'])) {
    $search_result = searchBook($_POST['query']);
    foreach ($search_result as $row) {
        echo $row["id_book"] . "</br>";
        echo $row["name"] . "</br>";
        echo $row["pages"] . "</br>";
        echo $row["author"] . "</br>";
    }
}
