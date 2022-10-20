<?php

function translateReplaceSpaces($string)
{

    $ruChars = 'А	Б	В	Г	Д	Е	Ё	Ж	З	И	Й	К	Л	М	Н	О	П	Р	С	Т	У	Ф	Х	Ц	Ч	Ш	Щ	Ъ	Ы	Ь	Э	Ю	Я';
    $enChars = 'A	B	V	G	D	E	E	ZH	Z	I	Y	K	L	M	N	O	P	R	S	T	U	F	KH	TS	CH	SH	SCH	’	Y	’	E	YU	YA';

    $tranArr = array_combine(explode('	', mb_strtolower($ruChars)), explode('	', strtolower($enChars)));
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
