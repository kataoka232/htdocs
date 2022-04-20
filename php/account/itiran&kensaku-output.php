<?php require '../header.php'; ?>
<html>
<?php
$pdo=new PDO('mysql:host=localhost;dbname=juku;charset=utf8', 
	'teacher', 'password');
$sql=$pdo->prepare('select * from account where name like ?');
$sql->execute(['%'.$_REQUEST['keyword'].'%']);
foreach ($sql as $row) {
	echo '<tr>';
	echo '<td>', $row['id'], '</td>';
	echo '<td>', $row['name'], '</td>';
	echo '<td>', $row['password'], '</td>','<br>' ;
	echo '</tr>';
	echo "\n";
}
?>
</html>
<?php require '../footer.php'; ?>
