<?php
namespace Otus;

require_once 'vendor/autoload.php';
session_start();

\Otus\Mvc\Core\App::run();
