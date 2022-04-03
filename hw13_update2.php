<?php

$a = 1;

$return_value = match($a) {
    default => forCycle($a)
};

function forCycle(&$a):void {
    if ($a <=15) {
        for($i = $a; $i <= 15; $i++){
        echo $i.PHP_EOL;
        }
    } else {echo '$a больше 15'.PHP_EOL;};

}
?>