<?php

/**
 * Получить значение элемента <input> формы поиска.
 * 
 * @return array Значение поля поиска в виде ассоциативного массива [field_name => value].
 */
function getFormData(): array
{
    $formData = [];
    // был непустой запрос на поиск книг
    if (filter_has_var(INPUT_POST, 'search') && mb_strlen($_POST['search']) > 0) {
        $searchString = filter_input(INPUT_POST, 'search', FILTER_SANITIZE_SPECIAL_CHARS);
        $searchString = trim($searchString);
        $formData['search'] = $searchString;
    }

    return $formData;
}
