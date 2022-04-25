<?php require '../header.php'; ?>
<?php
$pdo=new PDO('mysql:host=localhost;dbname=juku;charset=utf8', 
	'teacher', 'password');
$sql=$pdo->prepare('delete from account where id=?');
if ($sql->execute([$_REQUEST['id']])) {
	echo '削除に成功しました。';
} else {
	echo '削除に失敗しました。';
}
?>
<?php require '../footer.php'; ?>
