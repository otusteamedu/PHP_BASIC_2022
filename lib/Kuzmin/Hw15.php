<?php

namespace Otus\Kuzmin;

class Hw15
{
    /**
     * Функция возвращает массив, где значения - это все числа в указанном диапазоне, которые делятся на 3 без остатка
     *
     * @param int $from
     * @param int $to
     * @param int $multiple
     * @return array
     */
    public function getNumbersOfMultiples(int $from, int $to, int $multiple): array
    {
        $res = [];

        while ($from <= $to) {
            if ($from % $multiple === 0) {
                $res[] = $from;
            }

            $from++;
        }

        return $res;
    }

    /**
     * Функция выводит на экран все эелеметы массива
     *
     * @param array $array
     * @param string|null $firstSymbol
     * @return string
     */
    public function prepareArrayToPrint(array $array, ?string $firstSymbol = null): string
    {
        $result = '';

        foreach ($array as $key => $value) {
            if (is_array($value)) {
                $result .= "$key:" . PHP_EOL;

                $print = '';
                foreach ($value as $item) {
                    if ($firstSymbol) {
                        if (lcfirst($firstSymbol) === lcfirst(mb_substr($item, 0, 1))) {
                            $print .= $item . ', ';
                        }
                    } else {
                        $print .= $item . ', ';
                    }
                }
                $result .= mb_substr($print, 0, -2) . PHP_EOL;
            } else {
                $result .= $value . PHP_EOL;
            }
        }

        return $result;
    }

    /**
     *Функция возвращает массив, в значениях которого для каждой цифры из указанного диапазона возвращается строка
     * с описание четное число или нечетное
     *
     * @param int $from
     * @param int $to
     * @return array
     */
    public function evenOrUneven(int $from, int $to): array
    {
        $res = [];

        do {
            if ($from === 0) {
                $res[] = "$from - это ноль";
            } elseif ($from % 2 === 0) {
                $res[] = "$from - это четное число";
            } else {
                $res[] = "$from - это нечетное число";
            }

            $from++;
        } while ($from <= $to);

        return $res;
    }

    /**
     * Функция возвращает транслитерированную строку
     *
     * @param string $value
     * @return string
     */
    public function translitString(string $value): string
    {

        $alphabet = [
            'а' => 'a', 'б' => 'b', 'в' => 'v', 'г' => 'g', 'д' => 'd',
            'е' => 'e', 'ё' => 'e', 'ж' => 'zh', 'з' => 'z', 'и' => 'i',
            'й' => 'y', 'к' => 'k', 'л' => 'l', 'м' => 'm', 'н' => 'n',
            'о' => 'o', 'п' => 'p', 'р' => 'r', 'с' => 's', 'т' => 't',
            'у' => 'u', 'ф' => 'f', 'х' => 'h', 'ц' => 'c', 'ч' => 'ch',
            'ш' => 'sh', 'щ' => 'sch', 'ь' => '\'', 'ы' => 'y', 'ъ' => '"',
            'э' => 'e', 'ю' => 'yu', 'я' => 'ya'
        ];

        return strtr($value, $alphabet);
    }

    /**
     * Функция заменяет пробелы в строке на нажнее подчеркивание
     *
     * @param string $value
     * @return string
     */
    public function replaceSpaces(string $value): string
    {
        return str_replace(' ', '_', $value);
    }

    /**
     * @param string $value
     * @return string
     */
    public function translitAndReplace(string $value): string
    {
        return self::replaceSpaces(self::translitString($value));
    }

    /**
     * Функция выводит строку
     *
     * @param string $data
     * @param string $type | 'console' для вывода данных в консоль | 'file' для вывода данных в файл
     * @return void
     */
    public function outputData(string $data, string $type): void
    {
        if ($type === 'file') {
            file_put_contents('data.txt', $data);
        } elseif ($type === 'console'){
            echo $data . PHP_EOL;
        }
    }
}