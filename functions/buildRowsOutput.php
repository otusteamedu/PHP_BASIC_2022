<?php
include 'renderTemplate.php';
function buildRowsOutput($books)
{
    $pathTemp = "../templates/templateOutput.html";
    $booksTableRowsHtml = '';
    foreach ($books as $book) {
        $booksTableRowsHtml .= renderTemplate($pathTemp, [
            'Id_1'     => $book['id_book'],
            'name_2'   => htmlspecialchars($book['name']),
            'pages_3'  => htmlspecialchars($book['pages']),
            'author_4' => htmlspecialchars($book['author']),
        ]);
    }
    return $booksTableRowsHtml;
}
