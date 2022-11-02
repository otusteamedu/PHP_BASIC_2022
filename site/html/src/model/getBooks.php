<?php

/**
 * Сформировать список книг из БД для отображения в таблице в зависимости от характера запроса
 * (поиск книг или весь список).
 *
 * @return array Список книг из БД.
 */
function getBooks(): array
{
    $books = [];
    // был непустой запрос на поиск книг
    if (filter_has_var(INPUT_POST, 'search') && mb_strlen($_POST['search']) > 0) {
        $searchString = filter_input(INPUT_POST, 'search', FILTER_SANITIZE_SPECIAL_CHARS);
        $searchString = trim($searchString);
        $books = querySearchBooks($searchString);
    } else {
        // вывести весь список в прочих случаях
        $books = queryBooksAll();
    }

    return $books;
}
