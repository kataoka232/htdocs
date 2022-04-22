<?php
$pdo = new PDO('mysql:host=localhost;dbname=juku;charset=utf8','root');
$sql = $pdo->prepare ('select * from courseid where name=:name');
$sql->bindValue(':name',$_REQUEST['name'],PDO::PARAM_STR);
$sql->execute();
$result = $sql->fetch();

if (empty($_REQUEST['name'])) {
	echo 'コース名を入力してください';
	echo '<br>';
	echo '<br>';
	echo '<input type="button" onclick="history.back()" value="登録画面に戻る">';
} else
if (!empty($result)) {
	echo 'すでに登録されています';
	echo '<br>';
	echo '<br>';
	echo '<input type="button" onclick="history.back()" value="登録画面に戻る">';
} else {
	$stmt = $pdo->prepare('insert into courseid (name) values (:name)');
	$stmt->bindValue (':name',$_REQUEST['name'],PDO::PARAM_STR);
	$stmt->execute();
	echo '登録完了しました。';
	echo '<br>';
	echo '<br>';
	echo '<input type="button" onclick="location.href=\'./course_list.php\'" value="リストに戻る">';
} 
?>
