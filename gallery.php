<?php

$dir = './img';
$files = array_diff(scandir($dir), array('..', '.'));

foreach ($files as $value) {

    $image = "./img/$value";
    echo '<a href="' . $image . '" target = "_blank"><img src="' . $image . '"></a>';
}
