<?php

require 'vendor/autoload.php';

denyAccessUnlessGranted();

var_dump(session_id());
var_dump($_SESSION);

phpinfo();
