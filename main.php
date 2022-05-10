<?php
require_once 'requirements.php';

session_start();

$booksCount = getBookCount();

if (empty($_GET)){
    $page = 'view.php';
    $books = getBooks();
} elseif(!empty($_GET['action'])){

    switch ($_GET['action']) {
        case 'add' : $page = $_GET['action'].'.php';
            break;
        case 'login-register' : $page = $_GET['action'].'.php';
            break;
    }

    if ($_GET['action'] === 'view' && isset($_GET['pageOrder'])){
        $page = 'view.php';
        $books = getBooks($_GET['pageOrder']);
    }

    if ($_GET['action'] === 'login'){
        $result = authenticateUser($_POST['email'], $_POST['password']);
        if ($result !== false) {
            $_SESSION['user_id'] = $result['uid'];
            $_SESSION['username'] = $result['username'];
            $_SESSION['is_admin'] = intval($result['is_admin']) === 1;
            header('Location: /');
        } else {
            header('Location: /');
            ?>
            <h4>Попытка аутентификации неуспешна. Введен неверный логин или пароль.</h4>
            <?php
        }
    }

    if ($_GET['action'] === 'register') {
        $result = registerUser($_POST['username'], $_POST['email'], $_POST['password']);
        if ($result !== false) {
            $_SESSION['user_id'] = $result['id'];
            $_SESSION['username'] = $result['username'];
            header('Location: /');
        } else {
            header('Location: /');
            ?>
            <h4>Попытка регистрации неуспешна.</h4>
            <?php
        }
    }

    if ($_GET['action'] === 'add_book' && !empty($_POST) && isset($_FILES['cover_img']) && $_FILES['cover_img']['size'] > 0){
        foreach ($_POST as $key => $value){
            $_POST[$key] = htmlspecialchars($value);
        }
        extract($_POST);

        $formatRow = getConfig()['image'];
        $allowedExtensions = explode(',', $formatRow['formats']);

        $ext = pathinfo($_FILES['cover_img']['name'], PATHINFO_EXTENSION);
        if(in_array($ext, $allowedExtensions))
        {
            $uniqName = uniqid().$_FILES['cover_img']['name'];
            if(move_uploaded_file($_FILES['cover_img']['tmp_name'],'gallery/'.$uniqName))
            {
                SetImgSize('gallery/'.$uniqName, 350, 240, 1, 'gallery/min/'.$uniqName);
                $coverImg = 'gallery/'.$uniqName;
                $coverImgMini = 'gallery/min/'.$uniqName;
                unset($uniqName);
                $result = addBook($author_name, $book_name, $book_about, $pages_count, $years_issue, $price, $coverImg, $coverImgMini);
                if ($result !== false){
                    header('Location: /');
                } else {
                    ?>
                    <h4>Книга не добавлена</h4>
                    <?php
                }
            } else {
                ?>
                <h4>Ошибка при добавлении новой книги!!!</h4>
                <?php
            }
        }
    }

    if ($_GET['action'] === 'search'){
        $page = 'view.php';
        if (!empty($_POST['book_search'])){
            $books = getBooks(0, htmlspecialchars($_POST['book_search']));
        } else {
            $books = getBooks();
        }

    }

    if ($_GET['action'] === 'book_delete' && $_SESSION['is_admin'] == 1){
        deleteBook($_GET['uid']);
        header('Location: /');
    }

    if ($_GET['action'] == 'logout'){
        session_destroy();
        header('Location: /');
    }
}
?>
<!DOCTYPE html>
<html lang="ru">

<head>
	<meta charset="utf-8" />
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>OTUS - книжный магазин</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<!-- Use Minified Plugins Version For Fast Page Load -->
	<link rel="stylesheet" type="text/css" media="screen" href="css/plugins.css" />
	<link rel="stylesheet" type="text/css" media="screen" href="css/main.css" />
	<link rel="shortcut icon" type="image/x-icon" href="image/favicon.ico">
</head>

<body>
	<div class="site-wrapper" id="top">
		<div class="site-header d-none d-lg-block">
			<div class="header-middle pt--10 pb--10">
				<div class="container">
					<div class="row align-items-center">
						<div class="col-lg-3 ">
							<a href="/" class="site-brand">
								<img src="image/logo.png" alt="">
							</a>
						</div>
						<div class="col-lg-3">
							<div class="header-phone ">
								<div class="icon">
									<i class="fas fa-headphones-alt"></i>
								</div>
								<div class="text">
									<p>Бесплатная поддержка 24/7</p>
									<p class="font-weight-bold number">+7 (909) 443-82-81</p>
								</div>
							</div>
						</div>
						<div class="col-lg-6">
							<div class="main-navigation flex-lg-right">
								<div class="cart-widget">
									<div class="login-block">
                                        <?php if (isAuthenticated()) {
                                            echo ($_SESSION['username'].' | #'.$_SESSION['user_id']); ?>
                                            <a href="index.php?action=logout" class="font-weight-bold">Выход</a>
                                        <?php } else {
                                        ?>
                                            <a href="index.php?action=login-register" class="font-weight-bold">Войти</a>
                                        <?php } ?>
									</div>

								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<?php include_once ($page)?>
	</div>

	<footer class="site-footer">
		<div class="footer-bottom">
			<div class="container">
				<p class="copyright-text">Copyright © 2022 <a href="#" class="author">Anton Shishak</a>. Все права защищены.
					<br>
					Design By Pustok</p>
			</div>
		</div>
	</footer>
	<!-- Use Minified Plugins Version For Fast Page Load -->
	<script src="js/plugins.js"></script>
	<script src="js/ajax-mail.js"></script>
	<script src="js/custom.js"></script>
</body>

</html>