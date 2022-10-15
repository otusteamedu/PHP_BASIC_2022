<?php
function power($val, $pow)
{
    if ($val == 0)
        return 0;
    elseif ($pow == 0)
        return 1;
    elseif ($pow < 0)
        return power(1 / $val, -$pow);
    else
        return $val * power($val, $pow - 1);
}

echo power(5, -2);
