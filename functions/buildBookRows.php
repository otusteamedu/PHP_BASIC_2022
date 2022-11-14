<?php
include 'renderTemplate.php';
function buildBookRows($books)
{
    $pathTemp = 'templates/template.html';
    $booksTableRowsHtml = '';
    foreach ($books as $book) {
        $booksTableRowsHtml .= renderTemplate($pathTemp, [
            'Id'     => $book['id_book'],
            'name'   => htmlspecialchars($book['name']),
            'pages'  => htmlspecialchars($book['pages']),
            'author' => htmlspecialchars($book['author']),
        ]);
    }
    return $booksTableRowsHtml;
}
