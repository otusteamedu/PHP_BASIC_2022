<?php
    require 'vendor/autoload.php';
    
    // аутентифицировать по remember-токену, если он есть
    rememberUser();

    $title = 'Фотогалерея';
    require 'head.php';
?>

<body>
    <header>
        <nav class="navbar navbar-expand-lg justify-content-between">
            <a href="/" class="navbar-brand"> <img src="/images/home.png"> </a>
            <h1 class="navbar-text"> Фотогалерея </h1>

            <!-- Блок пользователя -->
            <?php if (isGranted()) {
                // Показываем кнопку выхода, если вход был успешный
                echo renderTemplate('templates/logout_form.html', [
                    'display_name' => $_SESSION['display_name'],
                    'csrf_token' => getCsrfToken('logout_csrf_token')
                ]);
            } else {
                // Показываем форму входа, если логин ещё не был произведён
                echo renderTemplate('templates/login_form.html', [
                    'login' => $_SESSION['login'] ?? '',
                    'csrf_token' => getCsrfToken('login_csrf_token'),
                    'form_error' => $_SESSION['login_form_error'] ?? ''
                ]);
            } ?>
        </nav>
    </header>

    <main>
        <div class="container-fluid">
            <!-- Отображаем галерею -->
            <?php if (isGranted()) {
                // Сформировать галерею
                $images = buildGallery();
                echo sprintf('<div class="row">%s</div>', $images);
            } else {
                echo renderTemplate('templates/alert_warning.html', [
                    'message' => 'Войдите на сайт для просмотра фотогалереи.'
                ]);
            } ?>

            <!-- Форма загрузки картинки для админов -->
            <?php if (isGranted('ROLE_ADMIN')) {
                echo renderTemplate('templates/upload_form.html', [
                    'csrf_token' => getCsrfToken('upload_csrf_token'),
                    'form_error' => $_SESSION['upload_form_error'] ?? ''
                ]);
            } ?>
        </div>
    </main>

    <footer>
       <?php include 'foot.php'; ?>
    </footer>
</body>

</html>
