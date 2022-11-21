<?php
session_start();
if (empty($_SESSION['token'])) {
    header('Location: /auth.php');
} else {
    header('Location: template/templateAdmin.php');
}
