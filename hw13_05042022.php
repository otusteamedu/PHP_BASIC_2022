<?php

$a = 7;

$return_value = match($a) {
    default => forCycle($a)
};

function forCycle(&$a) {
     if ($a <=15) {
        for($i = $a; $i <= 15; $i++){
            $a .= $i; 
    }
    } else {echo '$a больше 15'.PHP_EOL;};
$a = substr($a, 1); 
return $a;
}
var_dump($return_value); 

?>