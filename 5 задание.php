<?php
function dateTime($h, $m)
{
    if ($h == 1 or $h == 21)
        echo "$h час ";
    elseif (($h >= 2 and $h <= 4) or ($h >= 22 and $h <= 24))
        echo "$h часа ";
    else
        echo "$h часов ";

    if ($m == 1 or $m == 21 or $m == 31 or $m == 41 or $m == 51)
        echo "$m минута";
    elseif (($m >= 2 and $m <= 4) or ($m >= 22 and $m <= 24) or ($m >= 32 and $m <= 34) or ($m >= 42 and $m <= 44))
        echo "$m минуты";
    else
        echo "$m минут";
}
$h = date('H');
$m = date('i');
echo dateTime($h, $m);
