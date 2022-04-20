<?php
$pdo = new PDO('mysql:host=localhost;dbname=juku;charset=utf8','root');
$sql = $pdo->prepare ('select * from courseid where name=:name');
$sql->bindValue(':name',$_REQUEST['name'],PDO::PARAM_STR);
$sql->execute();
$result = $sql->fetch();

if (empty($_REQUEST['name'])) {
	echo 'コース名を入力してください';
} else
if ($result > 0) {
	echo 'すでに登録されています';
} else {
	$stmt = $pdo->prepare('update courseid set name=? where id=?');
	$stmt->bindValue (':name',$_REQUEST['name'],PDO::PARAM_STR);
	$tsmt->bindValue (':id',$_REQUEST['id'],PDO::PARAM_INT);
	$stmt->execute();
	echo '登録完了しました。';
} 
?>
<br>
<br>
<input type="button" onclick="location.href='./course_list.php'" value="リストに戻る">
