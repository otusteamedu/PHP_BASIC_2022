<section class="breadcrumb-section">
    <h2 class="sr-only">Site Breadcrumb</h2>
    <div class="container">
        <div class="breadcrumb-contents">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="index.php">Главная</a></li>
                    <li class="breadcrumb-item active">Добавление новой книги</li>
                </ol>
            </nav>
        </div>
    </div>
</section>
<main class="page-section inner-page-sec-padding-bottom">
	<div class="container">
		<div class="row">
			<div class="col-sm-12 col-md-12 col-lg-8 col-xs-12">
				<form action="index.php?action=add_book" method="post" enctype="multipart/form-data">
					<div class="login-form">
						<h4 style = "text-align: center" class="login-title">Добавление новой книги</h4>
                        <p style="color: red">*Все поля обязательны для заполнения</p>
						<div class="row">
							<div class="col-md-12 col-12 mb--15">
								<label for="author_name">Автор книги</label>
								<input class="mb-0 form-control" type="text" name="author_name" id="book_author">
							</div>
							<div class="col-md-12 col-12 mb--15">
								<label for="book_name">Название книги</label>
								<input class="mb-0 form-control" type="text" name="book_name" id="book_name">
							</div>
							<div class="col-md-12 col-12 mb--15">
								<label for="book_about">Описание книги</label>
								<textarea class="mb-0 form-control" name="book_about" id="book_about" rows="5"></textarea>
							</div>
							<div class="col-12 mb--20">
								<label for="pages_count">Кол-во страниц</label>
								<input class="mb-0 form-control" type="number" id="pages_count" name="pages_count">
							</div>
							<div class="col-12 mb--20">
								<label for="years_issue">Год издания</label>
								<input class="mb-0 form-control" type="number" maxlength="4" id="years_issue" name="years_issue">
							</div>
							<div class="col-12 mb--20">
								<label for="price">Стоимость, руб.</label>
								<input class="mb-0 form-control" type="number" id="price" name="price">
							</div>
							<div class="col-12 mb--20">
								<label for="cover_img">Картинка обложки</label>
								<input type="file" id="cover_img" name="cover_img">
							</div>
							<div class="col-md-12" style="text-align: right">
								<button class="btn btn-outlined" type="submit">Добавить</button>
							</div>
						</div>
					</div>
				</form>
			</div>
		</div>
	</div>
</main>
