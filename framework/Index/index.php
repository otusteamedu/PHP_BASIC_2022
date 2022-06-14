<?php
namespace Otus;
session_start();

require_once '../vendor/autoload.php';

\Otus\Mvc\Core\App::run();
