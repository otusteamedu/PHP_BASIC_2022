<?php

function router(array $getParams) {
    if (isset($getParams['book'])) {
        require_once APP_PATH . DIRECTORY_SEPARATOR . 'controllers/bookController.php';
    } elseif (isset($getParams['action']) && $getParams['action'] === "bookAdd") {
        require_once APP_PATH . DIRECTORY_SEPARATOR . 'controllers/addBookController.php';
    } elseif (isset($getParams['name']) || isset($getParams['author'])) {
        require_once APP_PATH . DIRECTORY_SEPARATOR . 'controllers/filterController.php';
    } elseif (empty($getParams)) {
        require_once APP_PATH . DIRECTORY_SEPARATOR . 'controllers/mainController.php';
    }
}