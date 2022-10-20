<?php
function translate($string)
{

    $ruChars = 'А	Б	В	Г	Д	Е	Ё	Ж	З	И	Й	К	Л	М	Н	О	П	Р	С	Т	У	Ф	Х	Ц	Ч	Ш	Щ	Ъ	Ы	Ь	Э	Ю	Я';
    $enChars = 'A	B	V	G	D	E	E	ZH	Z	I	Y	K	L	M	N	O	P	R	S	T	U	F	KH	TS	CH	SH	SCH	’ 	Y	’ 	E	YU	YA';

    $tranArr = array_combine(explode('	', mb_strtolower($ruChars)), explode('	', strtolower($enChars)));
    $stringArr = preg_split('//u', mb_strtolower($string), 0);

    $requestedArr = [];

    for ($i = 0; $i < count($stringArr); $i++) {
        foreach ($tranArr as $key => $value) {
            if ($stringArr[$i] == $key) {
                array_push($requestedArr, $value);
                break;
            } elseif (preg_match('/\s/', $stringArr[$i])) {
                array_push($requestedArr, $stringArr[$i]);
                break;
            }
        }
    }

    return implode($requestedArr);
}

echo translate('Объявить массив индексами которого являются буквы русского языка а значениями соответствующие латинские буквосочетания');
