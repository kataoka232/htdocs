<?php require '../menu.php'; ?>

<?php
$pdo = new PDO('mysql:host=localhost;dbname=juku;charset=utf8','root');
$sql = $pdo->prepare ('select count(name) from courseid where name=:name and delete_flg=0');
$sql->bindValue(':name',$_REQUEST['name'],PDO::PARAM_STR);
$sql->execute();

if (empty($_REQUEST['name'] )) {
	echo 'コース名を入力してください。';
} else
if ($sql > 0) {
	echo 'すでに登録されています';
} else {
	$stmt = $pdo->prepare('update courseid set name=:name where id=:id');
	$stmt->bindValue (':name',$_REQUEST['name'],PDO::PARAM_STR);
	$stmt->bindValue (':id',$_REQUEST['id'],PDO::PARAM_INT);
	$stmt->execute();
	echo '更新しました。';
} 
?>
<br>
<br>
<input type="button" onclick="location.href='./course_list.php'" value="リストに戻る">
