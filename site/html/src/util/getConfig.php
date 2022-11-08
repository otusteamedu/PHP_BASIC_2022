<?php

/**
 * Считать конфигурацию из файла .env и записать её в окружение запроса.
 * Подразумевается, что файл .env находится в корневой директории проекта,
 *  и что в include_path указан путь к ней.
 *
 * @throws ErrorException Если невозможно открыть файл .env по указанному пути.
 */
function getConfig(): void
{
    $dotEnv = file_get_contents('.env', true);
    if ($dotEnv === false) {
        throw new ErrorException("Невозможно прочитать конфигурацию", 1);
    }
    $dotEnvAssignments = explode("\n", $dotEnv);
    array_walk(
        $dotEnvAssignments,
        fn ($assignment, $index) => preg_match('/^[a-zA-Z0-9_]+=/', $assignment) && putenv($assignment)
    );
}
