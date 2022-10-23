<?php

$menuArr = [
    'Item 1',
    'Item 2' => ['Subitem 1' => ['Subitem8'], 'Subitem 2', 'Subitem 3'],
    'Item 3' => ['Subitem 4', 'Subitem 5', 'Subitem 6']
];

function menuRender($arr)
{

    $renderArr[] = '<ul>';
    foreach ($arr as $key => $value) {
        if (is_array($value)) {
            $renderArr[] = '<li>' . $key . menuRender($value) . '</li>';
        } else {
            $renderArr[] = '<li>' . $value . '</li>';
        }
    }
    $renderArr[] = '</ul>';

    return implode($renderArr);
}

echo menuRender($menuArr);
