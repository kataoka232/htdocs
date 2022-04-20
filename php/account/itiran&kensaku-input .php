<?php require '../header.php'; ?>
キーワードを入力してください。
<form action="itiran&kensaku-output.php" method="post">
<input type="text" name="keyword">
<input type="submit" value="検索">

<?php
$pdo=new PDO('mysql:host=localhost;dbname=juku;charset=utf8','teacher', 'password');
foreach ($pdo->query('select * from account') as $row) {
	echo '<p>';
	echo $row['id'], ':';
	echo $row['name'], ':';
	echo $row['password'];
	echo '</p>';
}
?>


</html>

</form>
<?php require '../footer.php'; ?>