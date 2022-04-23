<section class="breadcrumb-section">
    <h2 class="sr-only">Site Breadcrumb</h2>
    <div class="container">
        <div class="breadcrumb-contents">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="index.php">Главная</a></li>
                    <li class="breadcrumb-item active">Регистрация / Вход</li>
                </ol>
            </nav>
        </div>
    </div>
</section>
<main class="page-section inner-page-sec-padding-bottom">
	<div class="container">
		<div class="row">
            <div class="col-sm-12 col-md-12 col-xs-12 col-lg-6 mb--30 mb-lg--0">
                <!-- Login Form s-->
                <form action="index.php?action=register" method="post">
                    <div class="login-form">
                        <h4 class="login-title" style = "text-align: center">Регистрация</h4>
                        <div class="row">
                            <div class="col-md-12 col-12 mb--15">
                                <label for="username">Имя пользователя</label>
                                <input class="mb-0 form-control" type="text" name="username" id="username"
                                       placeholder="Введите имя ">
                            </div>
                            <div class="col-md-12 col-12 mb--15">
                                <label for="email">Email</label>
                                <input class="mb-0 form-control" type="email" name="email" id="email" placeholder="Введите Ваш email здесь...">
                            </div>
                            <div class="col-md-12 col-12 mb--15">
                                <label for="password">Пароль</label>
                                <input class="mb-0 form-control" type="password" id="password" name="password" placeholder="Введите пароль">
                            </div>
                            <div class="col-md-12" style="text-align: right">
                                <button class="btn btn-outlined" type="submit">Регистрация</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
            <div class="col-sm-12 col-md-12 col-lg-6 col-xs-12">
				<form action="index.php?action=login" method="post">
					<div class="login-form">
						<h4 style = "text-align: center" class="login-title">Вход</h4>
						<div class="row">
							<div class="col-md-12 col-12 mb--15">
								<label for="email">Логин</label>
								<input class="mb-0 form-control" type="email" name="email" id="email" placeholder="Введите Ваш email здесь...">
							</div>
							<div class="col-12 mb--20">
								<label for="password">Пароль</label>
								<input class="mb-0 form-control" type="password" name="password" id="password" placeholder="Введите Ваш пароль">
							</div>
							<div class="col-md-12" style="text-align: right">
								<button class="btn btn-outlined" type="submit">Войти</button>
							</div>
						</div>
					</div>
				</form>
			</div>
		</div>
	</div>
</main>
