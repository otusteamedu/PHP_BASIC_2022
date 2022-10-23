<?php

function translateReplaceSpaces($string)
{

    $ruChars = ['а', 'б', 'в', 'г', 'д', 'е', 'ё', 'ж', 'з', 'и', 'й', 'к', 'л', 'м', 'н', 'о', 'п', 'р', 'с', 'т', 'у', 'ф', 'х', 'ц', 'ч', 'ш', 'щ', 'ъ', 'ы', 'ь', 'э', 'ю', 'я'];
    $enChars = ['a', 'b', 'v', 'g', 'd', 'e', 'e', 'zh', 'z', 'i', 'y', 'k', 'l', 'm', 'n', 'o', 'p', 'r', 's', 't', 'u', 'f', 'kh', 'ts',    'ch', 'sh', 'sch', '’', 'y', '’', 'e', 'yu', 'ya'];

    $tranArr = array_combine($ruChars, $enChars);
    $stringArr = preg_split('//u', mb_strtolower($string), 0, PREG_SPLIT_NO_EMPTY);

    for ($i = 0; $i < count($stringArr); $i++) {
        foreach ($tranArr as $key => $value) {
            if ($stringArr[$i] == $key) {
                $reqArr[] = $value;
                break;
            } elseif (preg_match('/\s/', $stringArr[$i])) {
                $reqArr[] = $stringArr[$i];
                break;
            }
        }
    }


    return preg_replace('/\s/', '_', implode($reqArr));
}

echo translateReplaceSpaces('Объединить две ранее написанные функции в одну');
