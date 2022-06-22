<?php

function translit(string $phrase): string
{
	$array = [
		'а' => 'a',
		'А' => 'A',
		'б' => 'b',
		'Б' => 'B',
		'в' => 'v',
		'В' => 'V',
		'г' => 'g',
		'Г' => 'G',
		'д' => 'd',
		'Д' => 'D',
		'е' => 'e',
		'Е' => 'E',
		'ё' => 'yo',
		'Ё' => 'YO',
		'ж' => 'zh',
		'Ж' => 'ZH',
		'з' => 'z',
		'З' => 'Z',
		'и' => 'i',
		'И' => 'I',
		'й' => 'j',
		'Й' => 'J',
		'к' => 'k',
		'К' => 'K',
		'л' => 'l',
		'Л' => 'L',
		'м' => 'm',
		'М' => 'M',
		'н' => 'n',
		'Н' => 'N',
		'о' => 'o',
		'О' => 'O',
		'п' => 'p',
		'П' => 'P',
		'р' => 'r',
		'Р' => 'R',
		'с' => 's',
		'С' => 'S',
		'т' => 't',
		'Т' => 'T',
		'у' => 'u',
		'У' => 'U',
		'ф' => 'f',
		'Ф' => 'F',
		'х' => 'kh',
		'Х' => 'KH',
		'ц' => 'ts',
		'Ц' => 'TS',
		'ч' => 'ch',
		'Ч' => 'CH',
		'ш' => 'sh',
		'Ш' => 'SH',
		'щ' => 'shch',
		'Щ' => 'SHCH',
		'ъ' => "''",
		'Ъ' => "''",
		'ы' => 'y',
		'Ы' => 'Y',
		'ь' => "'",
		'Ь' => "'",
		'э' => 'e',
		'Э' => 'E',
		'ю' => 'yu',
		'Ю' => 'YU',
		'я' => 'ya',
		'Я' => 'YA',
	];

	$a = strtr($phrase, $array);
	return str_replace(' ', '_', $a);
}

echo translit('вО   поЛе береЗа  стОЯла');