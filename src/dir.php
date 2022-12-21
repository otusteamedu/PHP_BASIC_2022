<?php
function files()
{
    $dir_big = "../img_big";
    $files = extension(scandir($dir_big));
    return $files;
}
