<?php

function myAutoloader($class) {
 include dirname(dirname(__DIR__)) . '/' .  $class . '.php';
}

spl_autoload_register('myAutoloader');