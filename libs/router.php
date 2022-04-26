<?php

function router(array $getParams) {
    if (isset($getParams['book']) && !isset($getParams['action'])) {
        require_once APP_PATH . DIRECTORY_SEPARATOR . 'controllers/bookController.php';
    } elseif (isset($getParams['action']) && $getParams['action'] === "bookAdd") {
        require_once APP_PATH . DIRECTORY_SEPARATOR . 'controllers/addBookController.php';
    } elseif (isset($getParams['action']) && $getParams['action'] === "registry") {
        require_once APP_PATH . DIRECTORY_SEPARATOR . 'controllers/registryController.php';
    } elseif (isset($getParams['action']) && $getParams['action'] === "logout") {
        require_once APP_PATH . DIRECTORY_SEPARATOR . 'controllers/logoutController.php';
    } elseif (isset($getParams['action']) && $getParams['action'] === "login") {
        require_once APP_PATH . DIRECTORY_SEPARATOR . 'controllers/authenticateController.php';
    } elseif (isset($getParams['action']) && $getParams['action'] === "delete") {
        require_once APP_PATH . DIRECTORY_SEPARATOR . 'api/deleteBook.php';
    } elseif (isset($getParams['name']) || isset($getParams['author'])) {
        require_once APP_PATH . DIRECTORY_SEPARATOR . 'controllers/filterController.php';
    } elseif (empty($getParams)) {
        require_once APP_PATH . DIRECTORY_SEPARATOR . 'controllers/mainController.php';
    }
}