<table>
<tr>
<td>ID</td>
<td>Название</td>
<td>Описание</td>
<td>Автор</td>
<td>Исполнитель</td>
<td>статус</td>
</tr>
<?php
foreAch($list as $elem){
	?>
	<tr>
	<td><?php echo $elem['id']; ?></td>
	<td><?php echo $elem['name']; ?></td>
	<td><?php echo $elem['description']; ?></td>
	<td><?php echo $elem['author_fio']; ?></td>
	<td><?php echo $elem['contractor_fio']; ?></td>
	<td><?php echo $states[$elem['status']]; ?></td>
	</tr>
	<?
}
?>
</table>