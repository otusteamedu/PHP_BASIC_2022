<form method="post" action="index.php">
    <p>
        <input type="search" name="q" placeholder="Поиск по сайту">
        <input type="submit" value="Найти">
    </p>
</form>
<?php

function connect()
{
    return new PDO('mysql:host=otus.php.basic.2022;dbname=otus17', 'root', 'root', [
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
        PDO::FETCH_ASSOC => true
    ]);
}

//var_dump(connect());
//die('test DB');

$db = connect();

if (!empty($_POST) && array_key_exists('q', $_POST)) {
    $result = $db->query("SELECT * FROM `library` WHERE `bookname` LIKE '%{$_POST['q']}%' OR `author` LIKE '%{$_POST['q']}%'");
} else {
    $result = $db->query("SELECT * FROM `library`");
}

$result->execute();
$list = $result->fetchAll(PDO::FETCH_ASSOC);

?>
<?php if (!empty($list)): ?>
<table>
	<thead>
		<tr>
			<th>ID</th>
			<th>Название книги</th>
			<th>Автор</th>
			<th>Количество страниц</th>
			<th>Год издания</th>

		</tr>
	</thead>
	<tbody>
		<?php foreach ($list as $row): ?>
		<tr>
			<td><?php echo $row['id']; ?></td>
			<td><?php echo $row['bookname']; ?></td>
			<td><?php echo $row['author']; ?></td>
			<td><?php echo $row['page_count']; ?></td>
			<td><?php echo $row['year_of_issue']; ?></td>
		</tr>
		<?php endforeach; ?>
	</tbody>
</table>
<?php else: ?>
    <b>По вашему запросу ничего не найдено</b>
<?php endif; ?>
