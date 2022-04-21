<?php

define("APP_PATH", __DIR__);

require_once APP_PATH . DIRECTORY_SEPARATOR . 'libs/router.php';

router($_GET);