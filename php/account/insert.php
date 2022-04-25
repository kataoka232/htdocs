<?php require '../header.php'; ?>
<p>アカウントを追加します。</p>
<form action="insert-output.php" method="post">
アカウント名<input type="text" name="name">
パスワード<input type="text" name="password">
<input type="submit" value="追加">
</form>

<?php
$pdo=new PDO('mysql:host=localhost;dbname=juku;charset=utf8', 
	'teacher', 'password');
$sql=$pdo->prepare('insert into account values(null, ?, ?, 0)');
if (empty($_REQUEST['name'])) {
	echo 'アカウント名を入力してください。';
} else
if (!preg_match("/^[a-zA-Z0-9]+$/", $_REQUEST['password'])) {
	echo 'パスワードを半角英数で入力してください。';
} else
if ($sql->execute(
	[htmlspecialchars($_REQUEST['name']), $_REQUEST['password']]
)) {
	echo '追加に成功しました。';
} else {
	echo '追加に失敗しました。';
}
?>
<?php require '../footer.php'; ?>
