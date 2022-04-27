<?php require '../menu.php'; ?>
<form action="insert.php" method="post">
アカウント名<input type="text" name="name"><br>
パスワード<input type="text" name="password"><br>
<input type="submit" value="追加">
<input type="button" onclick="history.back()" value="戻る">
</form>

<?php
$pdo=new PDO('mysql:host=localhost;dbname=juku;charset=utf8', 'root');

$sql=$pdo->prepare('insert into account values(null, ?, ?, 0)');
if (empty($_POST['name'])) {
	echo 'アカウント名を入力してください。';
} else if (!preg_match("/^[a-zA-Z0-9]+$/", $_REQUEST['password'])) {
	echo 'パスワードを入力してください。';
} else if ($sql->execute([htmlspecialchars($_REQUEST['name']), $_REQUEST['password']])) {
	echo '追加に成功しました。';
} else {
	echo '追加に失敗しました。';
}
?>
<?php require '../footer.php'; ?>
