<?php
declare(strict_types=1);
function db_connect() {
    return new PDO('mysql:host=localhost;dbname=otus_lib','root','root',[
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
        PDO::FETCH_ASSOC => true
    ]);
}

function authenticate($username, $pass, $remember) {
    $pdo = db_connect();
    $query  = $pdo->prepare('select * from users where username = ?');
    $query ->execute([$username]);
    $result = $query->fetch(PDO::FETCH_ASSOC);
    if (!$result) {
        return false;
    } else {
        if (!empty($result['username']) && ($result['username']) === $username)   {
            if (password_verify($pass,$result['hash_paswd'])) {
                $token = $remember ? uniqid() : null;
                $query = $pdo->prepare('update users set remember_token = ? where id = ?');
                $query->execute([$token,$result['id']]);
                $result['token'] = $token;
                return $result;
            }
            return false;
        } 
            
    }    
    return false;
}

function authenticate_by_token($token) {
    $pdo = db_connect();
    $result = $pdo->prepare('select * from users where remember_token = ?');
    $result->execute([$token]);
    $count = $result->rowCount();
    if($count > 0)
    {
        return $result->fetch();
    }
    return false;
}

function db_add_newuser($username, $hash_paswd, $remember_token) {
    $pdo = db_connect();
    $result = $pdo->prepare('insert into users(username, hash_paswd, remember_token) values(?,?,?)');
    $result->execute([$username, $hash_paswd, $remember_token]);
}

function db_get_all_bookinfo() {
    $pdo = db_connect();
    $result = $pdo->query('SELECT otus_book.book_name, otus_book.book_author, images.picture, images.picture_full, otus_book.book_id  from images JOIN otus_book ON images.book_img_id = otus_book.book_id WHERE (images.book_img_id, images.created_at) IN (SELECT book_img_id, min(created_at) FROM images GROUP BY book_img_id)', PDO::FETCH_ASSOC);
    $result->execute();
    return $result->fetchAll();
}

function db_get_the_bookinfo() {
    $pdo = db_connect();
    $book_id = $_GET['book_id'];
    $result = $pdo->prepare('select otus_book.book_name, otus_book.book_author, images.picture, images.picture_full, otus_book.book_id  from images 
                                        JOIN otus_book ON images.book_img_id = otus_book.book_id where otus_book.book_id = :book_id', [
                                            PDO::FETCH_ASSOC
                                        ]);
    $result->bindParam('book_id', $book_id, PDO::PARAM_INT);
    $result->execute();
    return $result->fetchAll();
}

function db_get_all_imgbook() {
    $pdo = db_connect();
    $book_id = $_GET['book_id'];
    $result = $pdo->prepare('select images.picture, images.picture_full from images 
                                        JOIN otus_book ON images.book_img_id = otus_book.book_id where otus_book.book_id = :book_id', [
                                            PDO::FETCH_ASSOC
                                        ]);
    
    $result->bindParam('book_id', $book_id, PDO::PARAM_INT);
    $result->execute();
    return $result->fetchAll();
}

function db_add_book($book_name, $book_author, $book_page, $book_created_dt) {
    $pdo = db_connect();
    $result = $pdo->prepare('insert into otus_book(book_name, book_author, book_page, book_created_dt) values(?,?,?,?)');
    $result->execute([$book_name, $book_author, $book_page, $book_created_dt]);
    return [
        'book_id' => $pdo->lastInsertId()   
   ];
}

function db_add_images($user_id, $book_img_id, $picture = null, $picture_full = null) {
    $pdo = db_connect();
    $result = $pdo->prepare('insert into images(user_id, book_img_id, picture, picture_full) values(?,?,?,?)');
    $result->execute([$user_id, $book_img_id, $picture, $picture_full]);
}

function db_delete_book($book_id) {
    $pdo = db_connect();
    $result = $pdo->prepare('delete from otus_book where book_id = ?');
    $result->execute([$book_id]);
}

?>
