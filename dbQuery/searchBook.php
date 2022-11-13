<?php
include 'conn/dbconn.php';
function searchBook($query)
{
    $conn = dbconn();
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
