<?php require '../menu.php'; ?>

<form action="insert.php" method="post">
アカウント名<input type="text" name="name"><br>
パスワード&emsp;<input type="text" name="password"><br>
<input type="submit" value="追加">&emsp;
 <input type="button" onclick="history.back()" value="戻る">&emsp;
<input type="button" onclick="location.href='./list.php'" value="リストに戻る">
</form>

<?php
$pdo=new PDO('mysql:host=localhost;dbname=juku;charset=utf8', 'root');

$sql=$pdo->prepare('insert into account values(null, ?, ?, 0)');
if (empty($_POST['name'])) {
	echo 'アカウント名を入力してください。','<br>';
} else if (!preg_match("/^[a-zA-Z0-9]+$/", $_POST['password'])) {
	echo 'パスワードを入力してください。';
} else if ($sql->execute([htmlspecialchars($_REQUEST['name']), $_REQUEST['password']])) {
	echo '追加に成功しました。';
} else {
	echo '追加に失敗しました。';
}
?>
<?php require '../footer.php'; ?>
