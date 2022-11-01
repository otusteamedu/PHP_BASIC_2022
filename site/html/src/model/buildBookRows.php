<?php

/**
 * Сформировать HTML-код строк таблицы книг на основании шаблона.
 *
 * @param array $books список книг из запроса к БД.
 *
 * @return string Фрагмент HTML-кода, содержащий строки таблицы книг или сообщение об отсутствии данных,
 *  если входной список пуст.
 */
function buildBookRows(array $books): string
{
    getConfig();
    $templatesDir = getenv('TEMPLATES_DIR');
    $bookTRTemplate = $templatesDir . '/book_table_row.html';
    $bookEmptyListTemplate = $templatesDir . '/book_empty_list.html';

    if (empty($books)) {
        return renderTemplate($bookEmptyListTemplate);
    }

    $booksTableRowsHtml = '';
    foreach ($books as $book) {
        $booksTableRowsHtml .= renderTemplate($bookTRTemplate, [
            'pNum'     => $book['id'],
            'name'     => htmlspecialchars($book['name']),
            'authors'  => htmlspecialchars($book['authors']),
            'publYear' => htmlspecialchars($book['publication_year']),
            'pagesNum' => htmlspecialchars($book['pages_number']),
        ]);
    }

    return $booksTableRowsHtml;
}
