<?php
function getImagesList(string $dir = 'img', int $bookId): string
{
	$return = '';
	$dir .= '/'.$bookId;
	if (file_exists($dir)){
		$listFiles = scandir($dir);
		$count = count($listFiles);
		$tpl = getImageTpl();
		$tpl = parseTpl($tpl, 'folder', $dir);
		for($i=0; $i<$count; $i++){
			if (is_file($dir."/".$listFiles[$i]) && is_file($dir."/thumbs/".$listFiles[$i])){
				$return .= parseTpl($tpl, 'file_name', $listFiles[$i]);

			}
		}
	}
	if (!$return) $return = 'Иллюстрации отсутствуют';
	return $return;
}

function getImageTpl(): string
{
	$tpl = '<div class="services" >
				<a href="__folder__/__file_name__" data-toggle="lightbox">
					<img src="__folder__/thumbs/__file_name__" class="img-fluid">
				</a>
			</div>';
	return $tpl;
}

function parseTpl(string $tpl, string $key, string $value): string
{
	return str_replace('__'.$key.'__', $value, $tpl);
}

function uploadFile(int $bookId): array
{
	$return = [];
	$return['error'] = 0;
	if (isset($_FILES) && $_FILES && $bookId){
		if (isset($_FILES["userfile"]["type"])){
		    if(strstr($_FILES["userfile"]["type"], 'image')){
				include('lib/resize.php');
				$tmp_name = $_FILES["userfile"]["tmp_name"];
				$salt = uniqid();
				if (!file_exists("img/".$bookId)){
					mkdir("img/".$bookId);
					mkdir("img/".$bookId."/thumbs");
				}
				$name = "img/".$bookId."/".$salt."_".$_FILES["userfile"]["name"];
				if (move_uploaded_file($tmp_name, $name)) {
					if (!imagepng(resize_image($name, 100, 100), "img/".$bookId."/thumbs/".$salt."_".$_FILES["userfile"]["name"])){
						$return['error'] = 1;
						$return['text'] = 'Ошибка создания миниатюры';
					}
				} else {
					$return['error'] = 1;
					$return['text'] = 'Ошибка загрузки';
				}
			} else {
				$return['error'] = 1;
				$return['text'] = 'Не допустимый формат файла';
			}
		} else {
			$return['error'] = 1;
			$return['text'] = 'Ошибка загрузки';
		}
	}
	return $return;
}

function login(object $db, string $user_name, string $password): array
{
	$user_name = strtolower($user_name); 
	$sql = "SELECT *
			FROM `users`
			WHERE `login` = '".$db->escape_string($user_name)."' 
					AND `password` = MD5('".$db->escape_string($password)."')
			LIMIT 1";
	$result = $db->fetchAll($sql);
	if (isset($result[0]))
		return $result[0];
	return [];
}

function loginByToken(object $db, string $token): array
{
	$user_name = strtolower($user_name); 
	$sql = "SELECT *
			FROM `users`
			WHERE `token` = '".$db->escape_string($token)."' 
			LIMIT 1";
	$result = $db->fetchAll($sql);
	if (isset($result[0]))
		return $result[0];
	return [];
}

function loginByToken_Bind(object $db, string $token): array
{
	$sql = "SELECT id, login, admin, token
			FROM users
			WHERE token = ?
			LIMIT 1";
	$result = $db->fetchBind($sql, 's', ['id', 'login', 'admin', 'token'], [$token]);
	if (isset($result[0]))
		return $result[0];
	return [];
}

function login_Bind(object $db, string $user_name, string $password): array
{
	$user_name = strtolower($user_name); 
	$sql = "SELECT id, login, admin, token
			FROM users
			WHERE login = ? AND `password` = MD5(?)
			LIMIT 1";
	$result = $db->fetchBind($sql, 'ss', ['id', 'login', 'admin', 'token'], [$user_name, $password]);
	if (isset($result[0]))
		return $result[0];
	return [];
}

function setToken(object $db, int $user_id): string
{
	$token = uniqid(); 
	$sql = "UPDATE `users`
        SET `token` = '".$db->escape_string($token)."'
        WHERE `id` = '".(int)$user_id."'
        LIMIT 1
        ";
    $db->query($sql);
    return $token;
}

function setToken_Bind(object $db, int $user_id): string
{
	$token = uniqid(); 
	$sql = "UPDATE users
        SET token = ?
        WHERE id = ?
        LIMIT 1
        ";
    $db->updateBind($sql, 'is', [$token, $user_id]);
    return $token;
}

function deleteBook_Bind(object $db, int $book_id, bool $isAdmin): bool
{
	if ($isAdmin && $book_id){
		$sql = "UPDATE books
	        SET removed = 1
	        WHERE id = ?
	        LIMIT 1
	        ";
	    return $db->updateBind($sql, 'i', [$book_id]);
	}
    return false;
}

function getAuthorId(object $db, string $last_name, string $name): int
{
	$user_name = strtolower($user_name); 
	$sql = "SELECT id
			FROM authors
			WHERE last_name = ? AND first_name = ?
			LIMIT 1";
	$result = $db->fetchBind($sql, 'ss', ['id'], [$last_name, $name]);

	if (isset($result[0])){
		return $result[0]['id'];
	} else {
		$insert = "INSERT INTO authors (last_name, first_name)
               VALUES ( ? ,? ) ";
	    return $db->insertBind($insert, 'ss', [$last_name, $name]);
	}
}

function addBook_bind(object $db, array $book_data, bool $isAdmin): bool
{
	if ($isAdmin && $book_data){
		if (isset($book_data['genre_id']) && $book_data['author_last_name'] && $book_data['author_name'] && $book_data['name']){
			$book_data['count_pages'] ?? 0;
			$author_id = getAuthorId($db, $book_data['author_last_name'], $book_data['author_name']);
			
		    $insert = "INSERT INTO books (name, author_id, count_pages)
	               VALUES ( ? ,? , ?) ";
		    $book_id = $db->insertBind($insert, 'sii', [$book_data['name'], $author_id, $book_data['count_pages']]);

		    $insert = "INSERT INTO book_genre (book_id, genre_id)
	               VALUES ( ? ,? ) ";
		    $db->insertBind($insert, 'ii', [$book_id, $book_data['genre_id']]);

	    	return true;
		}
	}
    return false;
}

function getGenres(object $db): array
{
	$sql = "SELECT `id`, `name`
			FROM `genre`
			WHERE 1
			ORDER BY `name` ";
	$res = $db->fetchAll($sql);
	return $res;
}

function showGenreSelect(object $db): string
{
	$list = getGenres($db);
	$return = '<select name="genre_id" class="form-control" > 
				<option value="0"> Укажите жанр </option>';
	$tpl = '<option value="__id__" >__name__</option>';
	foreach($list as $k => $v){
		$option = parseTpl($tpl, 'id', $v['id']);
		$option = parseTpl($option, 'name', $v['name']);
		$return .= $option;
	}
	$return .= '</select>';
	return $return;
}

function getBooks_bind(object $db, string $searchString = '', int $limit = 10): array
{
	$where = 'removed = 0 ';
	$params = [];
	$types = '';
	if ($searchString){
		$params[] = '%'.$searchString.'%';
		$params[] = '%'.$searchString.'%';
		$params[] = '%'.$searchString.'%';
		$types .= 'sss';
		$where .= " AND (books.name LIKE ?
					OR CONCAT( `authors`.`last_name`, ' ', `authors`.`first_name` ) LIKE ?
					OR CONCAT( `authors`.`first_name`, ' ', `authors`.`last_name` ) LIKE ?
					)";
	}
	$sql = "SELECT books.id, books.name, books.count_pages, 
					CONCAT( authors.last_name, ' ', authors.first_name ) as author_name,
					genre.name as genre_name
			FROM books
			LEFT JOIN authors ON authors.id = books.author_id
			LEFT JOIN book_genre ON book_genre.book_id = books.id
			LEFT JOIN genre ON genre.id = book_genre.genre_id
			WHERE ".$where."
			ORDER BY books.id DESC
			LIMIT ? ";
	$params[] = $limit;
	$types .= 'i';
	$res = $db->fetchBind($sql, $types, ['id', 'name', 'count_pages', 'author_name', 'genre_name'], $params);
	return $res;
}

function showBookTpl(array $bookInfo, bool $isAdmin):string
{
	$return = '';
	$tpl = "<tr id='book___id__' >
				<th scope='row'>__id__</td>
				<td>__name__</td>
				<td>__author_name__</td>
				<td>__count_pages__</td>
				<td>__genre_name__</td>
				<td><a href='book_page.php?id=__id__'>иллюстрации</a></td>
				<td>";
	if ($isAdmin){
		$tpl .= "<i class='glyphicon glyphicon-remove x-remove' data-id='__id__' ></i>";
	}
	$tpl .= "</td></tr>";
	if($bookInfo){
		$return = $tpl;
		foreach($bookInfo as $k => $val){
			$value = $val ?? '';
			$return = parseTpl($return, $k, $value);
		}

	}
	return $return;
}


?>