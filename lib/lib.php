<?php
function getBooks(string $searchString = '', int $limit = 10): array
{
	global $db;
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

function showBookTpl(array $bookInfo):string
{
	$return = '';
	if($bookInfo){
		$return = "<tr>
					<th scope='row'>".($bookInfo['id'] ?? '')."</td>
					<td>".($bookInfo['name'] ?? '')."</td>
					<td>".($bookInfo['author_name'] ?? '')."</td>
					<td>".($bookInfo['count_pages'] ?? '')."</td>
					<td>".($bookInfo['genre_name'] ?? '')."</td>
				</tr>";
	}
	return $return;
}
?>