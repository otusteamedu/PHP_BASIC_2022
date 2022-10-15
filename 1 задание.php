<?php


function sum($arg1, $arg2)
{
    return $arg1 + $arg2;
}

$result = sum(2, 3);
echo $result;

function sub($arg1, $arg2)
{
    return $arg1 - $arg2;
}

$result = sub(3, 2);
echo $result;

function mlt($arg1, $arg2)
{
    return $arg1 * $arg2;
}
$result = mlt(3, 2);
echo $result;

function div($arg1, $arg2)
{
    return $arg1 / $arg2;
}
$result = div(6, 2);
echo $result;
