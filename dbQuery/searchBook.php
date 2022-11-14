<?php
include "../conn/dbconn.php";
include "../functions/buildRowsOutput.php";
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
    $books = buildRowsOutput($search_result);
    echo $books;
}
