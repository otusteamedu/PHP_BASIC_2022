<?php

require_once ("api/getBooks.php");

echo "<pre>";
print_r(getBooks());
echo "</pre>";

echo "<pre>";
print_r($_POST);
echo "</pre>";
echo "<pre>";
print_r($_FILES);
echo "</pre>";

echo "<a href='/add.php'>добавить книгу </a>";