<?php

/**
 * Считать конфигурацию из файла .env и записать её в окружение запроса.
 * Подразумевается, что файл .env находится в корневой директории проекта (т.е. на уровень выше public).
 *
 * @throws ErrorException Если невозможно открыть файл .env по указанному пути.
 */
function getConfig(): void
{
    $dotEnv = file_get_contents(realpath($_SERVER['DOCUMENT_ROOT'] . '/../.env'));
    if ($dotEnv === false) {
        throw new ErrorException("Невозможно прочитать конфигурацию", 1);
    }
    $dotEnvAssignments = explode("\n", $dotEnv);
    array_walk($dotEnvAssignments, fn ($assignment, $index) => $assignment && putenv($assignment));
}
