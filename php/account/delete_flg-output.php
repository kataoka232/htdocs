<?php require '../header.php'; ?>
<table>
<?php
$pdo=new PDO('mysql:host=localhost;dbname=juku;charset=utf8', 
	'teacher', 'password');
if ($row['delete_flg']==0) {
	echo '削除に成功しました。';
} else {
	echo '削除に失敗しました。';

}
?>
</table>
<?php require '../footer.php';?>