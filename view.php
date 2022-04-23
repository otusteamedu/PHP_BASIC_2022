<?php
    require_once 'requirements.php';
?>
<section class="breadcrumb-section">
	<h2 class="sr-only">Site Breadcrumb</h2>
	<div class="container">
		<div class="breadcrumb-contents">
			<nav aria-label="breadcrumb">
				<ol class="breadcrumb">
					<li class="breadcrumb-item"><a href="index.php">Главная</a></li>
					<li class="breadcrumb-item active">Магазин</li>
				</ol>
			</nav>
		</div>
	</div>
</section>
<main class="inner-page-sec-padding-bottom">
	<div class="container">
		<div class="shop-toolbar mb--30">
			<div class="row align-items-center">
				<div class="col-lg-1 col-md-2 col-sm-6">
					<!-- Product View Mode -->
					<div class="product-view-mode">
						<a href="#" class="sorting-btn active" data-target="grid"><i class="fas fa-th"></i></a>
					</div>
				</div>
                <div class="col-xl-3 col-md-4 col-sm-6  mt--10 mt-sm--0">
					<span class="toolbar-status">
						Всего книг в продаже: <?php echo($booksCount); ?>
					</span>

				</div>
                <div class="col-lg-6">
                    <div class="header-search-block">
                        <form action="index.php?action=search" method="post">
                            <input type="text" name="book_search" placeholder="Ищем...">
                            <button type="submit">Найти</button>
                        </form>
                    </div>
                </div>
                <?php if (isAuthenticated() && $_SESSION['is_admin'] == 1) {?>
                    <div class="col-lg-2 col-md-4 col-sm-6  mt--10 mt-sm--0" style="text-align: right">
                        <a href="index.php?action=add" class="btn btn-outlined" >Добавить книгу</a>
                    </div>
                <?php } ?>
			</div>
		</div>
		<div class="shop-product-wrap grid with-pagination row space-db--30 shop-border">
            <?php
            if (!empty($books)){
            foreach ($books as $book){
            ?>
            <div class="col-lg-4 col-sm-6">

                <div class="product-card">
                        <div class="product-grid-content">
						<div class="product-header">
							<a href="" class="author">
                                <?php echo ($book['author_name']); ?>
							</a>
							<h3><a href="#"><?php echo ($book['book_name']); ?></a></h3>
						</div>
						<div class="product-card--body">
							<div class="card-image">
								<img src="<?php echo ($book['cover_img_mini']); ?>" alt="">
								<div class="hover-contents">
									<a href="#" class="hover-image">
										<img src="<?php echo ($book['cover_img_mini']); ?>" alt="">
									</a>
									<div class="hover-btns">
										<a href="#" data-toggle="modal" data-target="#quickModal"
										   class="single-btn">
											<i class="fas fa-eye"></i>
										</a>
									</div>
								</div>
							</div>
							<div class="price-block">
								<span class="price">&#8381; <?php echo ($book['price']); ?></span>
                                <?php if (isAuthenticated() && $_SESSION['is_admin'] == 1) {?>
                                    <div class="login-block">
                                        <a href="index.php?action=book_delete&uid=<?php echo($book['uid']) ?>">Удалить книгу</a>
                                    </div>
                                <?php } ?>
							</div>
						</div>
					</div>

				</div>

			</div>
                <?php
            }
            }
            ?>
		</div>
		<!-- Pagination Block -->
		<div class="row pt--30">
			<div class="col-md-12">
				<div class="pagination-block">
					<ul class="pagination-btns flex-center">

                        <!-- Первая страница -->
                        <li><a href="/" class="single-btn prev-btn ">|<i class="zmdi zmdi-chevron-left"></i></a></li>

                        <!-- Предыдущая страница -->
                        <?php
                            $pageOrder = intval($_GET['pageOrder']) == 0 ? 1 : intval($_GET['pageOrder']);
                            if ($pageOrder > 1){
                                $prevPage = $pageOrder - 1;
                        ?>
                                <li><a href="index.php?action=view&pageOrder=<?php echo($prevPage); ?>" class="single-btn prev-btn "><i class="zmdi zmdi-chevron-left"></i> </a></li>
                        <?php
                        }
                        ?>

                        <!-- Страницы -->
                        <?php
                            $pagesCount = ceil($booksCount/6);
                            for ($i=1; $i<=$pagesCount;$i++){
                        ?>
                                <li <?php if ($pageOrder == $i) echo('class="active"'); ?>><a href="index.php?action=view&pageOrder=<?php echo($i); ?>" class="single-btn"><?php echo($i); ?></a></li>
                        <?php
                            }
                        ?>

                        <!-- Следующая страница -->
                        <?php
                            $pageOrder = intval($_GET['pageOrder']) > 0 ? intval($_GET['pageOrder']) : 1;
                            $nextPage = $pageOrder >= $pagesCount ? $pagesCount : $pageOrder + 1;
                        ?>
                        <li><a href="index.php?action=view&pageOrder=<?php echo($nextPage); ?>" class="single-btn next-btn"><i class="zmdi zmdi-chevron-right"></i></a></li>

                        <!-- Последняя страница -->
                        <li><a href="index.php?action=view&pageOrder=<?php echo($pagesCount); ?>" class="single-btn next-btn"><i class="zmdi zmdi-chevron-right"></i>|</a></li>
					</ul>
				</div>
			</div>
		</div>
		<!-- Modal -->
		<div class="modal fade modal-quick-view" id="quickModal" tabindex="-1" role="dialog"
			 aria-labelledby="quickModal" aria-hidden="true">
			<div class="modal-dialog" role="document">
				<div class="modal-content">
					<button type="button" class="close modal-close-btn ml-auto" data-dismiss="modal"
							aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
					<div class="product-details-modal">
						<div class="row">
							<div class="col-lg-12">
								<!-- Product Details Slider Big Image-->
								<div class="product-details-slider sb-slick-slider arrow-type-two"
									 data-slick-setting='{
              "slidesToShow": 1,
              "arrows": false,
              "fade": true,
              "draggable": false,
              "swipe": false,
              "asNavFor": ".product-slider-nav"
              }'>
									<div class="single-slide">
										<img src="<?php echo ($book['cover_img']); ?>" alt="">
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</main>
