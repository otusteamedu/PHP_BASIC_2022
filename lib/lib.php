<?php
function getBooks(object $db, string $searchString = '', int $limit = 10): array
{
	$where = '1';
	if ($searchString){
		$where .= " AND (`books`.`name` LIKE '%".$db->escape_string($searchString)."%' 
					OR CONCAT( `authors`.`last_name`, ' ', `authors`.`first_name` ) LIKE '%".$db->escape_string($searchString)."%'
					OR CONCAT( `authors`.`first_name`, ' ', `authors`.`last_name` ) LIKE '%".$db->escape_string($searchString)."%'
					)";
	}
	$sql = "SELECT `books`.`id`, `books`.`name`, `books`.`count_pages`, 
					CONCAT( `authors`.`last_name`, ' ', `authors`.`first_name` ) as `author_name`,
					`genre`.`name` as `genre_name`
			FROM `books`
			LEFT JOIN `authors` ON `authors`.`id` = `books`.`author_id`
			LEFT JOIN `book_genre` ON `book_genre`.`book_id` = `books`.`id`
			LEFT JOIN `genre` ON `genre`.`id` = `book_genre`.`genre_id`
			WHERE ".$where."
			ORDER BY `books`.`id`
			LIMIT ".(int)$limit." ";
	$res = $db->fetchAll($sql);
	return $res;
}

function getBooks_bind(object $db, string $searchString = '', int $limit = 10): array
{
	$where = '1';
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
			ORDER BY books.id
			LIMIT ? ";
	$params[] = $limit;
	$types .= 'i';
	$res = $db->fetchBind($sql, $types, ['id', 'name', 'count_pages', 'author_name', 'genre_name'], $params);
	return $res;
}

function showBookTpl(array $bookInfo):string
{
	$return = '';
	$tpl = "<tr>
				<th scope='row'>__id__</td>
				<td>__name__</td>
				<td>__author_name__</td>
				<td>__count_pages__</td>
				<td>__genre_name__</td>
			</tr>";
	if($bookInfo){
		$return = $tpl;
		foreach($bookInfo as $k => $val){
			$value = $val ?? '';
			$return = parseTpl($return, $k, $value);
		}

	}
	return $return;
}

function parseTpl(string $tpl, string $key, string $value): string
{
	return str_replace('__'.$key.'__', $value, $tpl);
}
?>