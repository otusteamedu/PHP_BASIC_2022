<?php

function excess($files)
{
    $result = [];
    for ($i = 0; $i < count($files); $i++) {
        if ($files[$i] != "." && $files[$i] != ".." && $files[$i] != ".DS_Store") {
            $result[] = $files[$i];
        }
    }
    return $result;
}
