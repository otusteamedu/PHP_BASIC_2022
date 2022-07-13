<?php
require_once('config.php');
?>

<form method="post" action="index.php">
    <div>
        <p>
            <input type="search" name="q" placeholder="Поиск по сайту">
            <input type="submit" value="Найти">
        </p>
    </div>
</form>

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
