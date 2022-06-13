<?php
if(!isset($_GET['action'])){
    $books = getAllBooks();
}else{
    switch ($_GET['action']){
        case 'show':
            if(isset($_GET['book_id'])){
                $books = GetFilteredBooks(array('isbn' => $_GET['book_id']));
            }
            break;
        case 'add_book':
            if(isAdmin()){
                addBook($_POST);
                header("Location: index.php");
            }
            break;
        case 'delete':
            if(isset($_GET['book_id']) and isAdmin()){
                deleteBook($_GET['book_id']);
                header("Location: index.php");
            }
            break;
        case 'hide':
            if(isset($_GET['book_id']) and isAdmin()){
                hideBook($_GET['book_id']);
                header("Location: index.php");
            }
            break;
        case 'show_book':
            if(isset($_GET['book_id']) and isAdmin()){
                showBook($_GET['book_id']);
                header("Location: index.php");
            }
            break;
        case 'filter_books':
            $books = getFilteredBooks($_POST);
            break;
        case 'add_img':
            if(isset($_FILES['user_image']) and empty($_FILES['user_image']['error'])){
                if(addImage($_GET['book_id'], $_FILES['user_image'])){
                    header("Location: index.php?action=show&book_id={$_GET['book_id']}");
                }
            }
            header("Location: index.php?action=show&book_id={$_GET['book_id']}");
            break;
    }
}