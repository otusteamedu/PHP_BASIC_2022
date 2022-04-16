<?php
function db_connect() {
    return new PDO('mysql:host=localhost;dbname=otus_lib','root','root',[
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
        PDO::FETCH_ASSOC => true
    ]);
}

function db_get_all_book($filter = null) {
    $pdo = db_connect();
    if($filter === null)
    {
        $result = $pdo->query('select * from otus_book', PDO::FETCH_ASSOC);
        $result->execute();
    } else {
        $sql = 'select * from otus_book where book_name like :params or book_author like :params2';
        $result = $pdo->prepare($sql, array(PDO::ATTR_CURSOR => PDO::CURSOR_FWDONLY));
        $result->execute(array('params' => "%{$filter}%", 'params2' => "%{$filter}%"));
    }
    return $result->fetchAll();
}



/*
function db_add_message($username, $message, $picture = null) {
    $pdo = db_connect();
    $result = $pdo->prepare('insert into messages(username, message, picture) values(?,?,?)');
    $result->execute([$username, $message, $picture]);
}
*/

/*
function db_delete_message($message_id) {
    $pdo = db_connect();
    $result = $pdo->prepare('delete from messages where id = ?');
    $result->execute([$message_id]);
}
*/