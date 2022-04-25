<?php require '../header.php'; ?>
<?php error_reporting(E_NOTICE); ?>
キーワードを入力してください。
<html>
<form action="kensaku2.php" method="post">
<input type="text" name="keyword">
<input type="submit" value="検索"><br>

<?php
  if(!empty($_POST["keyword"])){
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
}
?>
</html>


</form>
<?php require '../footer.php'; ?>