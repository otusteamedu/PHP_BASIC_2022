<?php

$a = 16;

$return_value = match($a) {
    1 => forCycle($a),
    2 => forCycle($a),
    3 => forCycle($a),
    4 => forCycle($a),
    5 => forCycle($a),
    6 => forCycle($a),
    7 => forCycle($a),
    8 => forCycle($a),
    9 => forCycle($a),
    10 => forCycle($a),
    11 => forCycle($a),
    12 => forCycle($a),
    13 => forCycle($a),
    14 => forCycle($a),
    15 => forCycle($a),
    default => 'значение не соответствует условиям задачи'
};

function forCycle(&$a) {
    for($i = $a; $i <= 15; $i++){
        $a .= $i;
    }
    $a = substr($a, 1);
    return $a;
}
var_dump($return_value);

?>