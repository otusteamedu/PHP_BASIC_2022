<?php

function gallery()
{
    $dir = dirname(__FILE__) . '/public/img/';

    $files = array_diff(scandir($dir), array('..', '.'));

    foreach ($files as $value) {

        echo '<a href="' . './img/' . $value . '" target = "_blank"><img src="' . './mini/' . $value . '"></a>';
    }
}
