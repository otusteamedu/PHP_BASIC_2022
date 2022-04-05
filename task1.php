<?php

function iWantToBeLogged()
{
    $result = 'I was called at ' . date('Y-m-d H:i:s');
    echo $result;
    file_put_contents("log.txt", $result . PHP_EOL, FILE_APPEND);
}

iWantToBeLogged();