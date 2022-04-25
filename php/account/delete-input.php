<?php require '../header.php'; ?>
<table>
<tr><th>商品番号</th><th>商品名</th><th>商品価格</th></tr>
<?php
$pdo=new PDO('mysql:host=localhost;dbname=juku;charset=utf8', 
	'teacher', 'password');
foreach ($pdo->query('select * from account') as $row) {
	echo '<tr>';
	echo '<td>', $row['id'], '</td>';
	echo '<td>', $row['name'], '</td>';
	echo '<td>', $row['password'], '</td>';
	echo '<td>';
	echo '<a href="delete-output.php?id=', $row['id'], '">削除</a>';
	echo '</td>';
	echo '</tr>';
	echo "\n";
}
?>
</table>
<?php require '../footer.php'; ?>
