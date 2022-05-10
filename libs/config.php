<?php
declare(strict_types=1);

function getConfig(): array
{
    $configPath = '..'.DIRECTORY_SEPARATOR.'config.ini';
    if(file_exists($configPath))
    {
        return parse_ini_file($configPath, true);
    }
    return [];
}
