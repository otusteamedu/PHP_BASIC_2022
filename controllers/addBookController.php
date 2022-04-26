<?php
session_start();

function getView() {
    if (isset($_SESSION['is_auth'])) {
        require_once APP_PATH . DIRECTORY_SEPARATOR . 'views/addBook.php';
    } else {
        header("Location:/");
    }
}

getView();